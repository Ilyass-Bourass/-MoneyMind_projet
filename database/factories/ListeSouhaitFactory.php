<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ListeSouhait;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListeSouhait>
 */
class ListeSouhaitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => 'téléphone iPhone 16 Pro Max',
            'montant' => 1000,
        ];
    }
}
