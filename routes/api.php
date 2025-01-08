<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Authentication Routes
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

// User Management Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/change-password', [App\Http\Controllers\AuthController::class, 'changePassword']);

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
    Route::post('/users', [App\Http\Controllers\UserController::class, 'create']);
    Route::post('/users/store', [App\Http\Controllers\UserController::class, 'create']);
    Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::post('/users/{id}/reset-password', [App\Http\Controllers\UserController::class, 'resetPassword']);
});

// Job Management Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/jobs', [App\Http\Controllers\JobController::class, 'index']);
    Route::post('/jobs', [App\Http\Controllers\JobController::class, 'store']);
    Route::get('/jobs/{id}', [App\Http\Controllers\JobController::class, 'show']);
    Route::put('/jobs/{id}', [App\Http\Controllers\JobController::class, 'update']);
    Route::delete('/jobs/{id}', [App\Http\Controllers\JobController::class, 'destroy']);
});

// Public Application Submission Route
Route::post('/applications', [App\Http\Controllers\ApplicationController::class, 'store']);

// Application Management Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/applications', [App\Http\Controllers\ApplicationController::class, 'index']);
    Route::get('/applications/{id}', [App\Http\Controllers\ApplicationController::class, 'show']);
    Route::delete('/applications/{id}', [App\Http\Controllers\ApplicationController::class, 'destroy']);
    Route::patch('/applications/{id}/note', [App\Http\Controllers\ApplicationController::class, 'updateNote']);
});
