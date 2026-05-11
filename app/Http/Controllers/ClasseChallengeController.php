<?php

namespace App\Http\Controllers;

use App\Models\ClasseChallenge;
use Illuminate\Http\Request;

class ClasseChallengeController extends Controller
{
    public function store(Request $request)
    {
        // 1. VALIDATION ET INTÉGRITÉ RÉFÉRENTIELLE
        $validatedData = $request->validate([
            // 'exists' garantit que personne n'envoie un faux ID via Postman
            'classe_id' => 'required|uuid|exists:classes,id',
            'challenge_id' => 'required|uuid|exists:challenges,id',
            'date_inscription' => 'required|date'
        ]);

        // 2. RÈGLE MÉTIER : On empêche l'inscription en double
        $exists = ClasseChallenge::where('classe_id', $validatedData['classe_id'])
                                 ->where('challenge_id', $validatedData['challenge_id'])
                                 ->exists();
        
        if ($exists) {
            // Code 400 (Bad Request) car la requête est illogique métier parlant
            return response()->json(['message' => 'Cette classe a déjà ce challenge.'], 400);
        }

        // 3. PERSISTANCE DES DONNÉES
        $affectation = ClasseChallenge::create($validatedData);

        return response()->json([
            'message' => 'Challenge affecté à la classe avec succès !',
            'data' => $affectation
        ], 201);
    }
}