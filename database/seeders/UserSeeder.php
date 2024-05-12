<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of sample user data
        $users = [
            [
                'email' => 'ken@gmail.com',
                'password' => Hash::make('password1'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'joses@gmail.com',
                'password' => Hash::make('password2'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'kabwoy@gmail.com',
                'password' => Hash::make('password3'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user4@gmail.com',
                'password' => Hash::make('password4'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user5@example.com',
                'password' => Hash::make('password5'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert the user data into the database
        DB::table('users')->insert($users);
    }
}
