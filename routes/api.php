<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LessonProgressController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('/user', [AuthController::class, 'user']);

Route::middleware('jwt.auth')->group(function () {
    Route::post('/lesson-progress', [LessonProgressController::class, 'updateProgress']);
    Route::get('/lesson-progress', [LessonProgressController::class, 'getProgress']);
});