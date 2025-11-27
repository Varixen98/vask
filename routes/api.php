<?php

use App\Http\Controllers\Api\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/getCities', [LocationController::class, 'getCities']);

Route::get('/getDistricts', [LocationController::class, 'getDistricts']);