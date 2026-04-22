<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ZooController;



// Student API routes
Route::apiResource('students', StudentController::class); //ISSUD


// Course API routes
Route::apiResource('courses', CourseController::class);

//ZOO
Route::apiResource('zoos', ZooController::class);
