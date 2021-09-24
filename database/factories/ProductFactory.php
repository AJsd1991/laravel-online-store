<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'slug' => $this->faker->unique()->slug(),
            'details' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'price' => $this->faker->randomNumber(),
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
