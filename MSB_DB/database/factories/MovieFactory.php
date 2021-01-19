<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl(),
            'rating' => $this->faker->numberBetween(0, 100),
            'comment' => $this->faker->text(100),
            'state' => 'Completed',
        ];
    }
}
