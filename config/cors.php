<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    */

    // 1. On cible précisément l'API et la route de sécurité Sanctum
    'paths' => ['*'],

    'allowed_methods' => ['*'],

    // 2. On force l'adresse exacte de ton React (on enlève le env() pour être sûr à 100%)
    'allowed_origins' => ['http://localhost:5173'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    // 3. Ça, c'est parfait, ça autorise le passage des mots de passe !
    'supports_credentials' => true,
];