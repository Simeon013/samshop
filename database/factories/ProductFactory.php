<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->unique->word(),
            'product_price' => $this->faker->randomNumber(),
            'product_image' => 'product_images/test.jpg',
            'status' => 1
        ];
    }
}
