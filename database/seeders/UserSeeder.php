<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $data = [
            [
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'johndoe@gmail.com',
                'password' => bcrypt('johndoe'),
                'phone' => '12 345 678 90 12',
            ],
            [
                'name' => 'Jame',
                'surname' => 'Smith',
                'email' => 'jamesmith@gmail.com',
                'password' => bcrypt('jamesmith'),
                'phone' => '12 345 678 90 12',
            ]
        ];

        User::insert($data);
    }
}
