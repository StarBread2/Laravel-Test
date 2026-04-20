<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

// Student API routes
Route::apiResource('students', StudentController::class); //ISSUD
