<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/save-location', [LocationController::class, 'store']);

// wisata tags kategori
use App\Http\Controllers\WisataController;
Route::resource('wisata', WisataController::class);

// multi images
use App\Http\Controllers\DestinationController;
Route::resource('destinations', DestinationController::class);
