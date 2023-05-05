<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('en_GB');
        return [
            'media' => $faker->imageUrl(360, 360),
            'title' => $faker->paragraph(1),
            'caption' => $faker->paragraph(2),
            'postOwner_id' => User::query()->inRandomOrder()->value('user_id'),
        ];
    }
}
