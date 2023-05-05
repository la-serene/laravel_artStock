<?php

namespace Database\Factories;

use Faker\Provider\Person as PersonAlias;
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
        $faker = \Faker\Factory::create('en_GB');
        $userID = strtoupper($faker->lexify() . $faker->numerify('####'));
        $gender = $faker->randomElement([0, 1]);
        return [
            'user_id' => $userID,
            'username' => $faker->userName(),
            'password' => $faker->password(8, 12),
            'first_name' => $faker->firstName($gender ? PersonAlias::GENDER_MALE : PersonAlias::GENDER_FEMALE),
            'last_name' => $faker->lastName(),
            'bio' => $faker->optional()->paragraph(2),
            'date_of_birth' => $faker->dateTimeBetween('-30 years', '-10 years'),
            'email' => $faker->safeEmail(),
            'gender' => $gender,
            'phone_number' => $faker->phoneNumber(),
            'avatar' => $faker->optional()->imageUrl(360, 360),
            'payment_method' => $faker->optional()->creditCardType(),
        ];
    }
}
