<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ["name" => "Clothing", "slug" => "clothing"],
            ["name" => "Tshirts", "slug" => "tshirts"],
            ["name" => "Hoodies", "slug" => "hoodies"],
            ["name" => "Caps", "slug" => "caps"],
            ["name" => "Accessories", "slug" => "accessories"],
            ["name" => "Stickers", "slug" => "stickers"],
            ["name" => "Posters", "slug" => "posters"],
            ["name" => "Vinyl", "slug" => "vinyl"],
            ["name" => "Signed merch", "slug" => "signed-merch"],
            ["name" => "Limited edition", "slug" => "limited-edition"],
        ];

        foreach ($items as $item) {
            DB::table("categories")->updateOrInsert(
                ["slug" => $item["slug"]],
                ["name" => $item["name"]]
            );
        }
    }
}
