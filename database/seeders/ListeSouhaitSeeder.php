<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ListeSouhait;
use App\Models\User;

class ListeSouhaitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer un utilisateur de test si aucun n'existe
        if (User::count() === 0) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password')
            ]);
        }

        // Récupérer le premier utilisateur
        $user = User::first();

        $souhaits = [
            [
                'user_id' => $user->id, // Utiliser l'ID de l'utilisateur existant
                'nom' => 'téléphone iPhone',
                'montant' => 12000,
            ],
            [
                'user_id' => $user->id,
                'nom' => 'MacBook Pro',
                'montant' => 15000,
                
            ],
            [
                'user_id' => $user->id,
                'nom' => 'Voyage à Paris',
                'montant' => 20000,
                
            ]
        ];

        foreach ($souhaits as $souhait) {
            ListeSouhait::create($souhait);
        }
    }
}
