<?php

namespace App\Http\Controllers;


use App\Models\Section;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    //
    // Belirli bir bölümün videolarını listele


    public function delete(Request $request)
    {
        // POST ile gelen id'yi alıyoruz
        $id = $request->input('id');
        try {
            // Section modeline göre ilgili id'yi buluyoruz
            $video = Video::find($id);

            // Eğer section bulunursa siliyoruz
            if ($video) {
                $video->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Video başarıyla silindi.',
                    'section' => $video
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


    public function store(Request $request)
    {
        // Validasyon kuralları
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'video' => 'nullable|mimes:mp4|max:50000', // Maksimum 50 MB boyutunda mp4 dosyası, isteğe bağlı
            'order' => 'nullable|integer',
            'section_id' => 'nullable|integer',
            'datasubsectionid' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Bölümü bul
            $section = Section::findOrFail($request->input('section_id'));

            // Veritabanında mevcut video kaydını bul
            $video = Video::where('datasubsectionid', $request->input('datasubsectionid'))
                ->where('section_id', $request->input('section_id'))
                ->where('order', $request->input('order'))
                ->first();

            // Eğer video mevcutsa, güncelleme işlemi yapılacak
            if ($video) {
                // Yeni video dosyası var mı kontrol et
                if ($request->hasFile('video')) {
                    // Eğer dosya yüklendiyse, 'videos' klasörüne kaydet
                    $videoPath = $request->file('video')->store('videos', 'public');
                    $videoUrl = '/storage/' . $videoPath;

                    // URL'i güncelle
                    $video->url = $videoUrl;

                    // Her durumda başlık ve diğer bilgileri güncelle
                    $video->update([
                        'title' => $request->input('title'),
                        'order' => $request->input('order', 0),
                        'section_id' => $request->input('section_id'),
                        'url' => isset($videoUrl) ? $videoUrl : $video->url, // Yalnızca URL değiştiyse güncelle
                        'datasubsectionid' => $request->input('datasubsectionid'),
                    ]);
                }
                else{



                    // Her durumda başlık ve diğer bilgileri güncelle
                    $video->update([
                        'title' => $request->input('title'),
                        'order' => $request->input('order', 0),
                        'section_id' => $request->input('section_id'),
                        'datasubsectionid' => $request->input('datasubsectionid'),
                    ]);
                }



                return response()->json([
                    'status' => 'success',
                    'message' => 'Bölüm başarıyla güncellendi.',
                    'video' => $video->id
                ], 200);
            } else {

                // Eğer video mevcut değilse, yeni video kaydı oluştur
                if ($request->hasFile('video')) {
                    // Dosyayı 'videos' klasörüne kaydet
                    $videoPath = $request->file('video')->store('videos', 'public');
                    $videoUrl = '/storage/' . $videoPath;
                }

                // Video kaydı oluştur
                $video = Video::create([
                    'section_id' => $section->id,
                    'title' => $request->input('title'),
                    'url' => isset($videoUrl) ? $videoUrl : null, // Eğer video yüklenmemişse URL null
                    'order' => $request->input('order', 0),
                    'datasubsectionid' => $request->input('datasubsectionid'),
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Video başarıyla eklendi.',
                    'video' => $video
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
