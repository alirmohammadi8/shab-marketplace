<?php

namespace Shab\Marketplace\Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'shipping_price' => $this->faker->randomFloat(2, 1, 20),
        ];
    }
}
