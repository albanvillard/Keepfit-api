<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory, HasUuids;

    // Les champs de base de ta table 'classes'
    protected $fillable = [
        'name',
        'level'
    ];

    /**
     * Une classe peut participer à PLUSIEURS défis.
     * Relation : Many-to-Many
     */
    public function challenges()
    {
        return $this->belongsToMany(Challenge::class, 'classe_challenges')
                    ->withPivot('date_inscription')
                    ->withTimestamps();
    }
}