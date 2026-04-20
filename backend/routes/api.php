<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working'
    ]);
});

// Student API routes
Route::get('/students', [StudentController::class, 'index']);