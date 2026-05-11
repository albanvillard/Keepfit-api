<?php

namespace App\Http\Controllers;

use App\Models\Exercise; 
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    // Route : GET /exercises
    public function index() 
    {
        // Fournit la liste des exercices pour peupler le menu déroulant dynamique en React
        return response()->json(Exercise::all(), 200);
    }
}