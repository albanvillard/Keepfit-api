<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\Classe;
use App\Models\ClasseChallenge;
use App\Models\Exercise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Création des Exercices
        $pompes = Exercise::create([
            'name' => 'Pompes',
            'description' => 'Exercice pour les pectoraux',
            'repetition' => 20
        ]);

        $squats = Exercise::create([
            'name' => 'Squats',
            'description' => 'Exercice pour les jambes',
            'repetition' => 30
        ]);

        $abdos = Exercise::create([
            'name' => 'Abdos',
            'description' => 'Renforcement abdominal',
            'repetition' => 25
        ]);

        // 2. Création des Challenges (liés aux exercices)
        $defiPompes = Challenge::create([
            'name' => 'Défi Pompes',
            'description' => 'Faire 100 pompes par jour',
            'status' => 'En cours',
            'date_start' => '2026-01-01',
            'date_end' => '2026-01-31',
            'exercise_id' => $pompes->id
        ]);

        $defiSquats = Challenge::create([
            'name' => 'Défi Squats',
            'description' => 'Faire 150 squats par jour',
            'status' => 'À venir',
            'date_start' => '2026-02-01',
            'date_end' => '2026-02-28',
            'exercise_id' => $squats->id
        ]);

        // 3. Création des Classes
        $sio1 = Classe::create(['name' => 'BTS SIO 1']);
        $sio2 = Classe::create(['name' => 'BTS SIO 2']);
        $sio3 = Classe::create(['name' => 'BTS SIO 3']);

        // 4. Affectation des Challenges aux Classes (RU 2)
        ClasseChallenge::create([
            'classe_id' => $sio1->id,
            'challenge_id' => $defiPompes->id,
            'date_inscription' => '2026-01-05'
        ]);

        ClasseChallenge::create([
            'classe_id' => $sio2->id,
            'challenge_id' => $defiSquats->id,
            'date_inscription' => '2026-02-02'
        ]);
    }
}