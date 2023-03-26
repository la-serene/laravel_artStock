<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userID = strtoupper(fake()->lexify() . fake()->numerify('####'));
        $gender = fake()->randomElement([0, 1]);
        return [
            'user_id' => fake()->$userID,
            'username' => fake()->userName(),
            'password' => fake()->password(8, 12),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'bio' => fake()->optional()->paragraph(2),
            'date_of_birth' => fake()->dateTimeBetween('30 years', '-10 years'),
            'email' => fake()->safeEmail(),
            'gender' => fake()->$gender,
            'phone_number' => fake()->optional()->phoneNumber(),
            'avatar' => fake()->optional()->image(asset('assets/user_avatar'),360, 360),
            'payment_method' => fake()->optional()->creditCardType(),
            'permission' => null
        ];
    }
}
