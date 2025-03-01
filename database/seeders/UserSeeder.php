<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'ilyass',
            'email' => 'ilyass@gmail.com',
            'password' => '123456789',
            
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'nabil',
            'email' => 'nabil@gmail.com',
            'password' => '123456789',
            'salaire_mensuel' => 9000,
            'montant_restant' => 9000,
            'objectif_mensuel' => 15000,
            'salaire_sauve' => 0,
            'date_credit' => 5,
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'ayman',
            'email' => 'ayman@gmail.com',
            'password' => '123456789',
            'salaire_mensuel' => 6000,
            'montant_restant' => 6000,
            'objectif_mensuel' => 20000,
            'salaire_sauve' => 0,
            'date_credit' => 10,
            'role' => 'user',
        ]);
        
    }
}
