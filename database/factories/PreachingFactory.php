<?php

namespace Database\Factories;

use App\Models\Church;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Preaching>
 */
class PreachingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->name(),
            'preacher_name'=>fake()->email(),
            'preaching_url'=>fake()->url(),
            'church_id'=>Church::all()->random()->id
        ];
    }
}
