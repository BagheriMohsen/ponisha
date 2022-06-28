<?php

use App\Http\Controllers\Api\V1\AnswerController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\QuestionController;
use App\Http\Controllers\Api\V1\UserController;
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
 * Question
 */
Route::middleware('auth:sanctum')->resource('questions', QuestionController::class);
Route::group(['middleware'=> ['auth:sanctum'], 'prefix' => 'questions', 'as' => 'questions.'], function() {
   Route::get('user', [QuestionController::class, 'getListByAuthenticateUser']);
});

/**
 * User
 */
Route::middleware('auth:sanctum')->resource('users', UserController::class);

/**
 * Answer
 */
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => '{question}/',], function() {
   Route::get('answers', [AnswerController::class, 'index']);
   Route::post('answers', [AnswerController::class, 'store']);
   Route::patch('accept/{answer}', [AnswerController::class, 'accept']);
});

/**
 * Comment
 */
Route::post('comments/questions/{question}', [CommentController::class, 'store']);
Route::post('comments/answers/{answer}', [CommentController::class, 'store']);
