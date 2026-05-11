<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    // Méthode appelée par la route POST /challenges
    public function store(Request $request)
    {
        // 1. VALIDATION : On sécurise l'API en vérifiant les données reçues
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'date_start' => 'required|date',
            // Règle logique : la fin doit être après (ou égale) au début
            'date_end' => 'required|date|after_or_equal:date_start', 
            // On vérifie que l'ID de l'exercice existe bien dans la table 'exercises'
            'exercise_id' => 'uuid|exists:exercises,id'
        ]);

        // 2. ORM ELOQUENT : On insère la nouvelle ligne en base de données
        $challenge = Challenge::create($validatedData);

        // 3. RÉPONSE HTTP : On renvoie du JSON avec le code 201 (Created)
        return response()->json([
            'message' => 'Challenge créé avec succès !',
            'data' => $challenge
        ], 201);
    }

    // Méthode appelée par la route GET /challenges
    public function index()
    {
        // Renvoie tous les défis au format JSON avec le code 200 (OK)
        return response()->json(Challenge::all(), 200);
    }
}