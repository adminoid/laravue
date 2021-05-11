<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // test email and password
        $user = User::create([
            'name' => 'admin',
            'email' => 'mr@adminoid.com',
            'password' => Hash::make('password'),
        ]);

        $user->roles()->save(new Role([
            'name' => 'Admin',
            'permissions' => '*',
        ]));

    }
}
