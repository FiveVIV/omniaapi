<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PresidentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');



//Provides all REST API routes for /api/presidents requires token for access
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('presidents', PresidentController::class)->middleware(["throttle:api"]);
});
