<?php

namespace Database\Factories;

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
            'product_category_ids' => $this->faker->randomElements([
                '01hx8kq32kefyye2g89j4k52f0', // contoh ID kategori
                '01hx8kq45r3vwdtdfkmzdksq30',
                '01hx8kq5y3sct6yffsdzrv9m9d',
            ], rand(1, 2)), // bisa satu atau dua kategori
            'images' => [
                $this->faker->imageUrl(640, 480, 'products', true),
                $this->faker->imageUrl(640, 480, 'products', true),
            ],
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
