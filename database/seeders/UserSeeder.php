<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();

        $users = [
           [
                'fname' => 'Super',
                'lname' => 'Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('12345678'),
                'role' => '1',
                'status' => '1'
            ],
            [
                'fname' => 'Pera',
                'lname' => 'Perić',
                'email' => 'pera@test.com',
                'password' => Hash::make('12345678'),
                'role' => '2',
                'status' => '1'
            ],
            [
                'fname' => 'Mika',
                'lname' => 'Mikić',
                'email' => 'mika@test.com',
                'password' => Hash::make('12345678'),
                'role' => '3',
                'status' => '1'
            ],
            [
                'fname' => 'Žika',
                'lname' => 'Žikić',
                'email' => 'zika@test.com',
                'password' => Hash::make('12345678'),
                'role' => '3',
                'status' => '1'
            ]
        ];

        User::insert($users);
    }
}
