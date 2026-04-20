<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;

// Student API routes
Route::apiResource('students', StudentController::class); //ISSUD


// Course API routes
Route::apiResource('courses', CourseController::class);
