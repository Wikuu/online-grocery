<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
                "unit" => "ml",
                "image" => "image 1",
                "weight" => 200,
                "price" => 20,
                "description" => "200 ml Coca Cola",
                "manufacture_id" => 1,
            ],
            [
                "name" => "Pepsi",
                "unit" => "ml",
                "image" => "image 2",
                "weight" => 200,
                "price" => 20,
                "description" => "200 ml Pepsi",
                "manufacture_id" => 2,
            ],
            [
                "name" => "Fanta",
                "unit" => "ml",
                "image" => "image 3",
                "weight" => 200,
                "price" => 20,
                "description" => "200 ml Fanta",
                "manufacture_id" => 3,
            ]
        ];

        Product::insert($data);
    }
}
