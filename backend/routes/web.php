<?php

use Illuminate\Support\Facades\Route;

use App\Models\Student;
use App\Models\Course;
use App\Models\Zoo;

// Route::get('/', function () {
//     $students = Student::with('course.college')->get();
//     $courses = Course::with('college')->get();

//     return view('welcome', compact('students', 'courses'));
// });

Route::get('/', function () {
    $zoos = Zoo::all();

    return view('welcome', compact('zoos'));
});
