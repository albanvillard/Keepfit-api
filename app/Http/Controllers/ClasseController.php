<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    // Route : GET /classes
    public function index()
    {
        // Utilisation de l'ORM Eloquent pour récupérer toutes les classes
        return response()->json(Classe::all(), 200);
    }
}