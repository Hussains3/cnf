<?php

namespace Database\Factories;

use App\Models\Ie_data;
use Illuminate\Database\Eloquent\Factories\Factory;

class Ie_dataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ie_data::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'bin_no' => $this->faker->unique()->numberBetween(1000, 5000),
            'ie' => ['Import', 'Export'][random_int(0, 1)],
            'name' => $this->faker->name,
            'owners_name' => $this->faker->name,
            'photo' => $this->faker->imageUrl(640, 480, 'business'),
            'destination' => $this->faker->address,
            'office_address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'house' => $this->faker->numberBetween(1, 500)

        ];
    }
}
