<?php

namespace Database\Factories;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    //

    public function definition()
    {
        return [
            'ain_no' => $this->faker->numberBetween(5000, 9000),
            'name' => $this->faker->company,
            'owners_name' => $this->faker->firstNameMale,
            'destination' => $this->faker->jobTitle,
            'office_address' => $this->faker->streetAddress,
            'phone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->safeEmail,
            'house' => $this->faker->word,
            'note' => $this->faker->text(20),
            'photo' => $this->faker->image(null, 50, 50, null, true, true, null),
        ];
    }
}
