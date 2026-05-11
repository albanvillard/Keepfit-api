<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory, HasUuids;

    // Les champs modifiables de l'exercice
    protected $fillable = [
        'name', 
        'description', 
        'repetition'
    ];

    /**
     * Un exercice peut être utilisé dans PLUSIEURS défis.
     * Relation : One-to-Many
     */
    public function challenges()
    {
        return $this->hasMany(Challenge::class);
    }
}