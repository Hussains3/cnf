<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@app.com';
        $user->password = Hash::make('password');
        $user->save();

        $role = '1';
        if ($roles) {
            $user->syncRoles(explode(',', $roles));
        }
    }
}
