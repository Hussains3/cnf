<?php

namespace Database\Factories;

use App\Models\Gfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class GfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'assesmentDate' => $this->faker->dateTimeBetween('-1 years', 'yesterday'),
            'greenFile' => $this->faker->numberBetween(10, 500),
            'waitingGreenFile' => $this->faker->numberBetween(10, 400)
        ];
    }
}
