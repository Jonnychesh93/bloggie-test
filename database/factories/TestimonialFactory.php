<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TestimonialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimonial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_name' => $this->faker->name(),
            'message'   => $this->faker->paragraph(),
            'rating'    => $this->faker->numberBetween(1, 5),
            'show'      => $this->faker->numberBetween(0, 1),
        ];
    }
}
