<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ClasseChallengeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// L'URL sera : POST http://127.0.0.1:8000/api/challenges
Route::post('/challenges', [ChallengeController::class, 'store']);



Route::post('/affectations', [ClasseChallengeController::class, 'store']);