<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;

class WatchController extends Controller
{

    public function show($id, $videoId)
    {
        // Veritabanından belirli bir kursu ID'ye göre al
        $course = Course::findOrFail($id); // Eğer ID bulunamazsa 404 dönecek
        $course = Course::with('sections.videos')->findOrFail($id);
        $videoIdd = Video::where('id', $videoId)->where('id', $id)->first();


        // Veriyi view'a gönder
        return view('courses.watch.view', compact('course', 'videoIdd'));
    }
}
