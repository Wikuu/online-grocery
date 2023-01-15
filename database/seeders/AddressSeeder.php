<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
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
                'country' => 'United States',
                'city' => 'New York',
                'district' => 'Manhattan',
                'zip_code' => '10001',
                'user_id' => 1
            ],
            [
                'country' => 'United States',
                'city' => 'Los Angeles',
                'district' => 'Hollywood',
                'zip_code' => '90028',
                'user_id' => 2
            ]
        ];

        Address::insert($data);
    }
}
