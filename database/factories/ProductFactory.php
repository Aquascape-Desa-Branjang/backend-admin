<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(3, true);

        return [
            'id' => Str::ulid()->toBase32(),
            'product_category_ids' => $this->faker->randomElements(ProductCategory::pluck('id'), rand(1, 4)), // bisa satu atau dua kategori
            'image' => 'static/gentong.jpg',
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraphs(3, true),
            'retail_price' => $this->faker->numberBetween(10000, 500000),
            'wholesale_prices' => [
                ['min_qty' => 10, 'price' => $this->faker->numberBetween(8000, 15000)],
                ['min_qty' => 50, 'price' => $this->faker->numberBetween(7000, 12000)],
            ],
            'shopee_link' => $this->faker->url(),
        ];
    }
}
