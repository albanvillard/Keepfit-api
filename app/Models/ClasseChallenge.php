<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseChallenge extends Model
{
    use HasFactory, HasUuids;

    // On force Laravel à utiliser le bon nom de table
    protected $table = 'classe_challenges';

    // Les champs requis pour l'affectation
    protected $fillable = [
        'classe_id',
        'challenge_id',
        'date_inscription'
    ];
}