<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function updateSections(Request $request)
    {
        // JSON verisini doğrudan alıyoruz
        $data = $request->json()->all();

        // Gönderilen veri array değilse veya boşsa hata döndür
        if (empty($data) || !is_array($data)) {
            return response()->json(['error' => 'Geçersiz veri: data bulunamadı veya format hatalı.'], 400);
        }

        foreach ($data as $sectionData) {
            // Bölüm ID'sine göre güncelle veya yeni bölüm oluştur
            $section = Section::where('datasectionid', $sectionData['id'])->first();
            if (!$section) {
                $section = new Section();
                $section->datasectionid = $sectionData['id']; // Yeni bölüm için ID atanıyor
            }
            $section->order = $sectionData['position'];
            $section->save();

            // Alt bölümleri işle
            if (!empty($sectionData['subsections']) && is_array($sectionData['subsections'])) {
                foreach ($sectionData['subsections'] as $subsectionData) {
                    $subsection = Video::where('datasubsectionid', $subsectionData['id'])->first();

                    if (!$subsection) {
                        $subsection = new Video();
                        $subsection->datasubsectionid = $subsectionData['id']; // Yeni alt bölüm için ID atanıyor
                    }

                    $subsection->order = $subsectionData['position'];
                    $subsection->section_id = $section->id; // `parentSectionId` yerine `section` ID'si kullanılıyor
                    $subsection->save();
                }
            }
        }

        return response()->json(['success' => 'Bölümler ve alt bölümler başarıyla güncellendi.']);
    }


    public function delete(Request $request)
    {
        // POST ile gelen id'yi alıyoruz
        $id = $request->input('id');
        try {
        // Section modeline göre ilgili id'yi buluyoruz
        $section = Section::find($id);

        // Eğer section bulunursa siliyoruz
        if ($section) {
            $section->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Bölüm başarıyla silindi.',
                'section' => $section
            ], 201);
        }


        } catch (\Exception $e) {
            // Hata mesajını döndür
            return response()->json([
                'status' => 'error',
                'message' => 'Bir hata oluştu: ' . $e->getMessage()
            ], 500);
        }
    }


    public function store(Request $request, $course_id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'order' => 'required|integer',
            'datasectionid' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Kursu bul
            $course = Course::findOrFail($course_id);

            // data-section-id'ye göre bölümü bulmaya çalış
            $section = Section::where('datasectionid', $request->input('datasectionid'))->first();

            if ($section) {
                // Eğer bölüm varsa, güncelle
                $section->update([
                    'title' => $request->input('title'),
                    'order' => $request->input('order', 0),
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Bölüm başarıyla güncellendi.',
                    'section' => [
                        'id' => $section->id,
                        'title' => $section->title,
                        'order' => $section->order,
                        'datasectionid' => $section->datasectionid,
                    ]
                ], 200);
            } else {
                // Eğer bölüm yoksa, yeni bir tane oluştur
                $section = Section::create([
                    'course_id' => $course->id,
                    'title' => $request->input('title'),
                    'order' => $request->input('order', 0),
                    'datasectionid' => $request->input('datasectionid', 0),
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Bölüm başarıyla oluşturuldu.',
                    'section' => [
                        'id' => $section->id,
                        'title' => $section->title,
                        'order' => $section->order,
                        'datasectionid' => $section->datasectionid,
                    ]
                ], 201);
            }

        } catch (\Exception $e) {
            // Hata mesajını döndür
            return response()->json([
                'status' => 'error',
                'message' => 'Bir hata oluştu: ' . $e->getMessage()
            ], 500);
        }
    }


}

