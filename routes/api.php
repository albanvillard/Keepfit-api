<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ClasseChallengeController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ClasseController; 

/*
|--------------------------------------------------------------------------
| API Routes (L'Aiguilleur de l'application)
|--------------------------------------------------------------------------
| C'est ici que sont définies les URL d'accès pour le Front-end (React).
| Chaque route écoute une URL spécifique et redirige la demande vers 
| la bonne méthode d'un Contrôleur.
*/

// Route par défaut de Laravel Sanctum (Pour récupérer l'utilisateur connecté)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// ==========================================================
// RÉALISATION 1 : AFFECTATION (Lier une classe à un défi)
// ==========================================================

// POST : Permet d'enregistrer une nouvelle affectation dans la base de données
Route::post('/affectations', [ClasseChallengeController::class, 'store']);


// ==========================================================
// RÉALISATION 2 : GESTION DES DÉFIS
// ==========================================================

// POST : Permet de créer et sauvegarder un nouveau challenge
Route::post('/challenges', [ChallengeController::class, 'store']);

// GET : Permet de récupérer la liste de tous les challenges (pour afficher les cartes)
Route::get('/challenges', [ChallengeController::class, 'index']); 


// ==========================================================
// ROUTES DE DONNÉES ANNEXES (Pour remplir les menus déroulants)
// ==========================================================

// GET : Récupère la liste de tous les exercices disponibles
Route::get('/exercises', [ExerciseController::class, 'index']);

// GET : Récupère la liste de toutes les classes disponibles
Route::get('/classes', [ClasseController::class, 'index']);