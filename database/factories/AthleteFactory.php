<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Athlete>
 */
class AthleteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $path = $this->faker->image('storage/app/public/images', 200, 200, 'person', true, true, 'person', false);
        return [
            'nom' => $this->faker->firstName(),
            'prenom' => $this->faker->lastName(),
            // 'photo' => $this->faker->imageUrl(360, 360, true)
            'photo' => $path,
            'urlPhoto' => config('app.url') . '/storage/app/public/' . Str::after($path, 'public/')
        ];
    }
}
