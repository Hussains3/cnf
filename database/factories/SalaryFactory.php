<?php

namespace Database\Factories;

use App\Models\Salary;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $month = date('m', strtotime(date('m') . " -1 month"));
        return [
            'year' => '2021',
            'month' => '1',
            'working_days' => 26,
            'holiday' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 11)
        ];
    }
}
