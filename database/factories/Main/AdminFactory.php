<?php

namespace Database\Factories\Main;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\Main\Admin>
 */
class AdminFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => strtolower(Str::ulid()),
            'name' => fake()->name(),
            'username' => '337407'.fake()->unique()->numberBetween(1000000, 9999999),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->e164PhoneNumber(),
            'password' => Hash::make('17091945'),
            'password_updated_at' => null,
            'remember_token' => Str::random(10),
            'is_active' => true,
            'note' => fake()->paragraph(),
        ];
    }
}
