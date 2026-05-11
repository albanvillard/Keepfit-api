<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory, HasUuids;

    // SÉCURITÉ : On liste strictement les champs modifiables par le front-end
    protected $fillable = [
        'name',
        'description',
        'status',
        'date_start',
        'date_end',
        'exercise_id'
    ];

    /**
     * Un défi est lié à UN SEUL exercice.
     * Relation : One-to-Many (Inversée)
     */
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    /**
     * Un défi peut être affecté à PLUSIEURS classes.
     * Relation : Many-to-Many (via la table pivot classe_challenges)
     */
    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'classe_challenges')
                    ->withPivot('date_inscription') // Permet d'inclure la date d'inscription lors des requêtes
                    ->withTimestamps();
    }
}