<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'is_admin' => 1,
                'created_at' => Carbon::now(),
            ]


        );
        User::insert(
            [
                'name' => 'Manager',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 1,

                'created_at' => Carbon::now(),
            ]
        );
        User::insert(
            [
                'name' => 'dhaka',
                'email' => 'dhaka@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 2,
                'created_at' => Carbon::now(),
            ]
        );
        User::insert(
            [
                'name' => 'chittagong',
                'email' => 'chittagong@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 3,
                'created_at' => Carbon::now(),
            ]
        );
        User::insert(

            [
                'name' => 'guest',
                'email' => 'guest@gmail.com',
                'password' => Hash::make('123456'),

                'created_at' => Carbon::now(),
            ]
        );
    }
}
