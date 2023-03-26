<?php

namespace Database\Factories;

use Faker\Provider\Person as PersonAlias;
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
        $faker = \Faker\Factory::create('en_GB');
        $adminID = strtoupper($faker->lexify('?????') . $faker->numerify('#####'));
        $gender = $faker->randomElement([0, 1]);
        return [
            'admin_id' => $adminID,
            'username' => $faker->userName(),
            'password' => $faker->password(16, 24),
            'first_name' => $faker->firstName($gender ? PersonAlias::GENDER_MALE : PersonAlias::GENDER_FEMALE),
            'last_name' => $faker->lastName(),
            'email' => $faker->safeEmail(),
            'gender' => $gender,
            'phone_number' => $faker->phoneNumber(),
            'avatar' => $faker->optional()->imageUrl(360, 360),
            'payment_method' => $faker->optional()->creditCardType(),
            'permission' => $faker->randomElement([1, 2])
        ];
    }
}
