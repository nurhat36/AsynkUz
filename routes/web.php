<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/courses', function () {
    return view('listcourses');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/courses/{id}', function ($id) {
    return view('courseview', ['courseId' => $id]);
});

