<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                "name" => "Technology",
                "parent_id" => null
            ],
            [
                "name" => "Phone",
                "parent_id" => 1
            ],
            [
                "name" => "Tablet",
                "parent_id" => 1
            ],
            [
                "name" => "Laptop",
                "parent_id" => 1
            ],
            [
                "name" => "Drink",
                "parent_id" => null
            ]
        ];

        Category::insert($data);
    }
}
