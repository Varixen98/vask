<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Totebag>
 */
class TotebagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   

        $images = [
            'tote1.png',
            'tote2.png',
            'tote3.png',
            'tote4.png',
        ];

        $randomImg = $this->faker->randomElement($images);

        return [
            //
            'item_name' => $this->faker->words(2, true) . 'Tote',
            'description' => $this->faker->sentences(3, true),
            'material' => $this->faker->randomElement(['Canvas', 'Leather', 'Denim', 'Polyester']),
            'price' => $this->faker->numberBetween(25000, 400000),
            'image_url' => 'images/' . $randomImg
            
        ];
    }
}
