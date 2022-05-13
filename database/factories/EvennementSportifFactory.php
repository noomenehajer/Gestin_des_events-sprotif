<?php

namespace Database\Factories;
use Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EvenementSportif>
 */
class EvennementSportifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $path = $this->faker->image('storage/app/public/images', 640, 800, 'sport', true, true, 'sport', false);
        return [
            'nom' => $this->faker->sentence(),
            'description' => $this->faker->words(2, true),
            'lieu' => $this->faker->state(),
            // 'poster' => $this->faker->imageUrl(360, 360, true),
            'poster' => $path,
            'urlPoster' => config('app.url') . '/storage/app/public/' . Str::after($path, 'public/'),
            'dateDebut' => $this->faker->date(),
            'dateFin' => $this->faker->date(),
        ];
    }
}
