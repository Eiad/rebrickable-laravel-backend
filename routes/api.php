<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LegoController;
use App\Http\Controllers\CustomSetController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('lego-parts', LegoController::class);

Route::post('/custom-sets', [CustomSetController::class, 'store']);

Route::get('/custom-sets', [CustomSetController::class, 'index']);
