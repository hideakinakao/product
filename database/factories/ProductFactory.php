<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'product_name' => $this->faker->realText(10),
            'company_id' => $this->faker->numberBetween($min = 1, $max = 4),
            'price' => $this->faker->numberBetween($min = 50, $max = 1000),
            'stock' => $this->faker->numberBetween($min = 0, $max = 100),
            'comment' => $this->faker->realText(100),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
}
