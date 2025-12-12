<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
$items = [
    ["name" => ["en" => "Clothing",          "ru" => "Одежда"],                  "slug" => "clothing"],
    ["name" => ["en" => "Tshirts",           "ru" => "Футболки"],                "slug" => "tshirts"],
    ["name" => ["en" => "Hoodies",           "ru" => "Худи"],                    "slug" => "hoodies"],
    ["name" => ["en" => "Caps",              "ru" => "Кепки"],                   "slug" => "caps"],
    ["name" => ["en" => "Accessories",       "ru" => "Аксессуары"],              "slug" => "accessories"],
    ["name" => ["en" => "Stickers",          "ru" => "Стикеры"],                 "slug" => "stickers"],
    ["name" => ["en" => "Posters",           "ru" => "Плакаты"],                 "slug" => "posters"],
    ["name" => ["en" => "Vinyl",             "ru" => "Винил"],                   "slug" => "vinyl"],
    ["name" => ["en" => "Signed merch",      "ru" => "Подписанный мерч"],        "slug" => "signed-merch"],
    ["name" => ["en" => "Limited edition",   "ru" => "Лимитированные издания"],  "slug" => "limited-edition"],
    ["name" => ["en" => "Music",             "ru" => "Музыка"],                  "slug" => "music"],
];

        foreach ($items as $item) {
            Category::updateOrCreate(
                ["slug" => $item["slug"]],
                [
                    "name" => [
                        "en" => $item["name"]["en"],
                        "ru" => $item["name"]["ru"],
                    ],
                    "created_at" => now(),
                    "updated_at" => now(),
                ]
            );
        }
    }
}
