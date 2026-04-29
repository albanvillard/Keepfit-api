<?php

namespace App\Http\Controllers;

use App\Models\ClasseChallenge;
use Illuminate\Http\Request;

class ClasseChallengeController extends Controller
{
    public function store(Request $request)
    {
        // 1. On vérifie que les ID envoyés existent bien dans nos tables
        $validatedData = $request->validate([
            'classe_id' => 'required|uuid|exists:classes,id',
            'challenge_id' => 'required|uuid|exists:challenges,id',
            'date_inscription' => 'required|date'
        ]);

        // 2. On vérifie que cette classe n'a pas DÉJÀ ce challenge (règle métier bonus !)
        $exists = ClasseChallenge::where('classe_id', $validatedData['classe_id'])
                                 ->where('challenge_id', $validatedData['challenge_id'])
                                 ->exists();
        
        if ($exists) {
            return response()->json(['message' => 'Cette classe a déjà ce challenge.'], 400);
        }

        // 3. On crée le lien
        $affectation = ClasseChallenge::create($validatedData);

        return response()->json([
            'message' => 'Challenge affecté à la classe avec succès !',
            'data' => $affectation
        ], 201);
    }
}