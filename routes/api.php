<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ClasseChallengeController;
use App\Http\Controllers\ExerciseController; // <-- N'oublie pas d'importer ce contrôleur !

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// --- ROUTES POUR LA RÉALISATION 1 (Affectation) ---
Route::post('/affectations', [ClasseChallengeController::class, 'store']);

// --- ROUTES POUR LA RÉALISATION 2 (Création de défi) ---

// 1. Recevoir les données du formulaire pour créer le défi
Route::post('/challenges', [ChallengeController::class, 'store']);

// 2. Envoyer la liste des exercices pour le menu déroulant du Front-End React
Route::get('/exercises', [ExerciseController::class, 'index']);