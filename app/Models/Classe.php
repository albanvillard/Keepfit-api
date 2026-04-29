<?php

namespace App\Models;

// Dans les deux fichiers :
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model // Classe ou ClasseChallenge
{
    use HasFactory, HasUuids;
    protected $guarded = [];
}
