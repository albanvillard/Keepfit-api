<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function store(Request $request)
    {
        // 1. On vérifie que les données envoyées par le front (React) sont valides
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            // On rend l'exercice optionnel pour l'instant pour faciliter les tests
            'exercise_id' => 'nullable|uuid|exists:exercises,id'
        ]);

        // 2. On crée le challenge dans la base de données (l'UUID se génère tout seul)
        $challenge = Challenge::create($validatedData);

        // 3. On renvoie un message de succès (Code HTTP 201: Created)
        return response()->json([
            'message' => 'Challenge créé avec succès !',
            'data' => $challenge
        ], 201);
    }
}