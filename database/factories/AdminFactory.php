<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $adminID = strtoupper(fake()->lexify('?????') . fake()->numerify('#####'));
        $gender = fake()->randomElement([0, 1]);
        return [
            'user_id' => fake()->$adminID,
            'username' => fake()->userName(),
            'password' => fake()->password(16, 24),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->safeEmail(),
            'gender' => fake()->$gender,
            'phone_number' => fake()->phoneNumber(),
            'avatar' => fake()->optional()->image(asset('assets/user_avatar'),360, 360),
            'payment_method' => fake()->optional()->creditCardType(),
            'permission' => fake()->randomElement([1, 2])
        ];
    }
}
