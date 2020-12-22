<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salary;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salary = new Salary();
        $salary->year = 2020;
        $salary->month = 12;
        $salary->absent = 5;
        $salary->work_point = 1564;
        $salary->parcent = 14;
        $salary->add = 82;
        $salary->final = 96;
        $salary->user_id = '1';
        $salary->save();
    }
}

            