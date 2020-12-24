<?php

namespace Database\Factories;

use App\Models\File_data;
use Illuminate\Database\Eloquent\Factories\Factory;

class File_dataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File_data::class;

    /**
     * Define the model's default state.
     *
     *
     *
     * @return array
     */


    public function definition()
    {

        $Ie = \App\Models\Ie_data::get();
        $agent = \App\Models\Agent::get();
        $operator = \App\Models\User::whereRoleIs('operator')->get();
        $pages = $this->faker->numberBetween(1, 40);
        $numberofPages = ($pages  >  1) ? ceil((($pages - 1) / 3  + 1)) : 1;

        return [
            'lodgement_no' => $this->faker->unique()->numberBetween(10000, 11000),
            'lodgement_date' => $this->faker->dateTimeBetween('-3 month', '+2 month')->format('Y-m-d'),
            'manifest_no' => $this->faker->unique()->numberBetween(15000, 16000),
            'manifest_date' => $this->faker->date(),
            'group' => $this->faker->numberBetween(1, 9),
            'ie_type' => ['Import', 'Export'][random_int(0, 1)],
            'ie_group' => $this->faker->numberBetween(0, 9),
            'goods_name' => $this->faker->word,
            'goods_type' => ['Perishable', 'Non-Perishable'][random_int(0, 1)],
            'be_number' => $this->faker->numberBetween(20000, 21500),
            'be_date' => $this->faker->date(),
            'fees' => 230,
            'page' => $pages,
            'status' => ['Received', 'Operated', 'Delivered', 'Printed'][random_int(0, 3)],
            'no_of_pages' => $numberofPages,
            'ie_data_id' => $Ie->random()->id,
            'agent_id' => $agent->random()->id,
            'operator_id' => $operator->random()->id



        ];
    }
}
