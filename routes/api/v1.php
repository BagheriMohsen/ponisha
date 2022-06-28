<?php

use App\Http\Controllers\Api\V1\AnswerController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\QuestionController;
use Illuminate\Support\Facades\Route;

/**
 * Authentication
 */
Route::group(['middleware' => ['guest'], 'prefix' => 'auth/', 'auth.'], function() {
    Route::post('login', LoginController::class);
    Route::post('register', RegisterController::class);

    Route::withoutMiddleware('guest')
        ->middleware('auth:sanctum')
        ->get('logout', LoginController::class);

});

/**
 * App
 */
Route::middleware('auth:sanctum')->resource('questions', QuestionController::class);

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => '{question}/',], function() {
   Route::get('answers', [AnswerController::class, 'index']);
   Route::post('answers', [AnswerController::class, 'store']);
});

