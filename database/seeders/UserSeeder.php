<?php

namespace Database\Seeders;

use App\Models\User;
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
        // todo: change email and password
        User::create([
            'name' => 'Admin',
            'email' => 'mr@adminoid.com',
            'password' => Hash::make('password'),
        ]);
    }
}
