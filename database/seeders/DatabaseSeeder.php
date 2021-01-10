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


        $this->call(LaratrustSeeder::class);

        $users = \App\Models\User::factory(10)->create();
        $users->each(function ($user) {
            $user->attachRole('operator');
            \App\Models\Salary::factory()->create(['user_id' => $user->id]);
        });
        \App\Models\Agent::factory(100)->create();
        \App\Models\Ie_data::factory(100)->create();
        \App\Models\File_data::factory(500)->create();
        //  \App\Models\Salary::factory(11)->create();
    }
}
