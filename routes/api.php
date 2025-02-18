<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/facilities', [App\Http\Controllers\HomeController::class, 'facilities']);
Route::get('/facility/{id}', [App\Http\Controllers\HomeController::class, 'getFacilityImages']);
Route::get('/events', [App\Http\Controllers\HomeController::class, 'events']);
Route::get('/heroImages', [App\Http\Controllers\HomeController::class, 'heroImages']);
