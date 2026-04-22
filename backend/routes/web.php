<?php

use Illuminate\Support\Facades\Route;

use App\Models\Zoo;

Route::get('/', function () {
    $zoos = Zoo::all();

    return view('welcome', compact('zoos'));
});


Route::get('/animals', function () {
    $zoos = Zoo::all();

    return view('animals.index', compact('zoos'));
});


Route::get('/animals/create', function () {
    $zoos = Zoo::all();

    return view('animals.create', compact('zoos'));
});


Route::get('/animals/edit', function () {
    $zoos = Zoo::all();
    
    return view('animals.edit', compact('zoos'));
});