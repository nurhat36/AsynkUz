<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WatchController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/courses/view/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create')->middleware('auth');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('/teachers/search', [TeacherController::class, 'search'])->name('teachers.search');
Route::get('/category/search', [CategoryController::class, 'search'])->name('category.search');



Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/courses/category', [CategoryController::class, 'store'])->name('category.store');




Route::resource('courses', CourseController::class);
Route::resource('courses.sections', SectionController::class);
Route::resource('sections.videos', VideoController::class);



// Section oluşturma rotası
Route::post('courses/view/{id}/sections', [SectionController::class, 'store'])->name('sections.store');
Route::post('courses/view/{id}/sections/delete', [SectionController::class, 'delete'])->name('sections.delete');
Route::post('courses/view/{id}/video/delete', [VideoController::class, 'delete'])->name('videos.delete');
Route::post('courses/view/{id}/sections/update', [SectionController::class, 'updateSections'])->name('section.update');

// Video oluşturma rotası
Route::post('courses/view/{id}/videos', [VideoController::class, 'store'])->name('videos.store');

Route::get('/courses/{id}/watch/{videoId}', [WatchController::class, 'show'])->name('courses.watch.view');

