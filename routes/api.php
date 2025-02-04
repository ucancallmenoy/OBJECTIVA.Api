<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LessonProgressController;
use App\Http\Controllers\QuizScoreController;
use App\Http\Controllers\QuizController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('jwt.auth')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/update-profile', [AuthController::class, 'updateProfile']);
    // ... other protected routes
});


Route::middleware('jwt.auth')->group(function () {
    Route::post('/lesson-progress', [LessonProgressController::class, 'updateProgress']);
    Route::get('/lesson-progress', [LessonProgressController::class, 'getProgress']);
});

Route::middleware('jwt.auth')->group(function () {
    Route::get('/quiz-scores', [QuizScoreController::class, 'getScores']);
    Route::post('/quiz-scores', [QuizScoreController::class, 'saveScore']);
    Route::get('/quiz-scores/{quizId}', [QuizScoreController::class, 'getCurrentScore']);
});

Route::get('abstraction-quizzes', [QuizController::class, 'getAbstractionQuizzes']);
Route::get('polymorphism-quizzes', [QuizController::class, 'getPolymorphismQuizzes']);
Route::get('inheritance-quizzes', [QuizController::class, 'getInheritanceQuizzes']);
Route::get('encapsulation-quizzes', [QuizController::class, 'getEncapsulationQuizzes']);