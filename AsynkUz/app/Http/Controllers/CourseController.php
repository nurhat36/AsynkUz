<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User; // User modelini içe aktardık
use App\Models\Section;
use App\Models\Video;
use App\Models\Category;

class CourseController extends Controller
{


    public function index()
    {
        // Tüm kursları öğretmen bilgileri ile birlikte getirin
        $courses = Course::with('teacher')->get();
        $courses = Course::with('category')->get();


        // Verileri view'e geç
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        // 'teacher' rolündeki kullanıcıları getir
        $teachers = User::where('role', 'teacher')->get();
        $categories = Category::whereNull('parent_id')->get();

        return view('courses.create', compact('teachers', 'categories'));
    }




    public function store(Request $request)
    {
        // 1. Validation işlemi
        $validatedData = $request->validate([
            'teacher_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'preview_image' => 'required|image',
            'intro_video' => 'required|mimes:mp4',
            'category_id' => 'required',
        ]);

        // 2. Dosya Yükleme İşlemi
        $previewImagePath = null;
        $introVideoPath = null;

        // Önizleme Resmi Yükleme
        if ($request->hasFile('preview_image')) {
            $previewImagePath = $request->file('preview_image')->store('preview_images', 'public');
        }

        // Video Yükleme
        if ($request->hasFile('intro_video')) {
            try {
                // Video dosyasını course_videos klasörüne kaydetme işlemi
                $introVideoPath = $request->file('intro_video')->store('course_videos', 'public');
                // Yüklenen dosya yolunu loglayın
                logger("Video dosyası yüklendi: " . $introVideoPath);
            } catch (\Exception $e) {
                return back()->with('error', 'Video yükleme sırasında bir hata oluştu: ' . $e->getMessage());
            }
        }

        // 3. Kursu veritabanına kaydetme işlemi
        Course::create([
            'teacher_id' => $validatedData['teacher_id'],
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'preview_image' => $previewImagePath,
            'intro_video' => $introVideoPath,
            'category_id' => $validatedData['category_id'],
        ]);

        // 4. Başarılı işlem sonrası yönlendirme
        return redirect()->route('courses.index')->with('success', 'Kurs başarıyla oluşturuldu.');
    }

    public function show($id)
    {
        // Veritabanından belirli bir kursu ID'ye göre al
        $course = Course::findOrFail($id); // Eğer ID bulunamazsa 404 dönecek
        $course = Course::with('sections.videos')->findOrFail($id);

        // Veriyi view'a gönder
        return view('courses.view', compact('course'));
    }


}
