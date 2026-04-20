<?php

use Illuminate\Support\Facades\Route;

use App\Models\Student;

Route::get('/', function () {
    $students = Student::with('course.college')->get();

    return view('welcome', compact('students'));
});
