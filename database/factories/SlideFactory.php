<?php

namespace Database\Factories;

use App\Models\Slide;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlideFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slide::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'subtitle' => $this->faker->sentence(),
            'alt' => $this->faker->word(),
            'image' => $this->faker->imageUrl(1200, 800),
            'link' => $this->faker->word(),
            'status' => $this->faker->boolean(),
        ];
    }
}
