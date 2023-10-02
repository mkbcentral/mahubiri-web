<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Church>
 */
class ChurchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'abreviation'=>Str::random(5),
            'email'=>fake()->email(),
            'phone'=>fake()->phoneNumber(),
            'logo_url'=>fake()->imageUrl(640, 480),
        ];
    }
}
