<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Anik Sen',
                'email' => 'anik@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Suranjana Bhowmick',
                'email' => 'Suranjana@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Simu Dey',
                'email' => 'simu@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Madhab Chandra Das',
                'email' => 'madhab@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Shajib Guha',
                'email' => 'shajib@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Shovon Chakraborty',
                'email' => 'shovon@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Anamika Roy',
                'email' => 'anamika@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Nirupoma Nipu',
                'email' => 'nirupoma@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Sraboni Debi',
                'email' => 'sraboni@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Avijit Sarker',
                'email' => 'avijit@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Shouhardya Dev',
                'email' => 'shouhardya@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Pranti Dev',
                'email' => 'pranti@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Dhiraj Barman',
                'email' => 'dhiraj@gmail.com',
                'role_id' => 2,
                'in_website' => True,
                'is_approved' => True,
                'password' => Hash::make('123456'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
