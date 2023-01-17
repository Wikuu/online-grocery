<?php

namespace Database\Seeders;

use App\Models\Manufacture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufactureSeeder extends Seeder
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
                "name" => "Coca Cola",
            ],
            [
                "name" => "Pepsi",
            ],
            [
                "name" => "Fanta",
            ]
        ];

        Manufacture::insert($data);
    }
}
