<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ZooController;

//ZOO
Route::apiResource('zoos', ZooController::class);
