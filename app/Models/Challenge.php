<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory, HasUuids; // Active la génération auto des UUID

    // Autorise l'insertion en masse pour toutes les colonnes
    protected $guarded = [];
}