<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(LaratrustSeeder::class);
        $this->call(SalarySeeder::class);
        $this->call(UserSeeder::class);
        \App\Models\Gfile::factory(100)->create();
        \App\Models\Agent::factory(100)->create();
    }
}
