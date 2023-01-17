<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
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
                "category_id" => 5,
            ],
            [
                "name" => "Pepsi",
                "unit" => "ml",
                "image" => "image 2",
                "weight" => 200,
                "price" => 20,
                "description" => "200 ml Pepsi",
                "manufacture_id" => 2,
                "category_id" => 5,

            ],
            [
                "name" => "Fanta",
                "unit" => "ml",
                "image" => "image 3",
                "weight" => 200,
                "price" => 20,
                "description" => "200 ml Fanta",
                "manufacture_id" => 3,
                "category_id" => 5,
            ]
        ];

        foreach ($data as $item) {
            $categoryId = $item["category_id"];
            unset($item["category_id"]);

            Product::create($item);

            CategoryProduct::create([
                "category_id" => $categoryId,
                "product_id" => Product::latest()->first()->id
            ]);
        }

    }
}
