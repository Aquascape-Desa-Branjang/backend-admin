<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(2, true); // contoh: "Minuman Ringan"

        return [
            'id' => (string) Str::ulid(),
            'order' => $this->faker->numberBetween(1, 10),
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
