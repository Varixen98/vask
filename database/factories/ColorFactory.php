<?php

    namespace Database\Factories;

    use App\Models\Totebag;
    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Color>
     */
    class ColorFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {

            $colors = [
                'Red' => '#FF0000',
                'Blue' => '#0000FF',
                'Green' => '#008000',
                'Black' => '#000000',
                'White' => '#FFFFFF',
                'Navy' => '#000080',
                'Maroon' => '#800000',
                'Yellow' => '#FFFF00',
                'Cyan' => '#00FFFF',
                'Magenta' => '#FF00FF',
                'Silver' => '#C0C0C0',
                'Gray' => '#808080',
                'Olive' => '#808000',
                'Purple' => '#800080',
                'Teal' => '#008080',
            ];

            $colorName = $this->faker->randomElement(array_keys($colors));

            return [
                //
                'totebag_id' => Totebag::factory(),
                'name' => $colorName,
                'hex_code' => $colors[$colorName],
            ];


        }
    }
