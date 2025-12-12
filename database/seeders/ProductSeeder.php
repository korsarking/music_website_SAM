<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = [

            "clothing" => [
                [
                    ["en" => "Rap Artist T-Shirt Black", "ru" => "Футболка рэп-артиста (чёрная)"],
                    35,
                    ["en" => "Classic black rap merch tee", "ru" => "Классическая чёрная футболка мерча рэп-артиста"],
                ],
                [
                    ["en" => "Rap Artist T-Shirt White", "ru" => "Футболка рэп-артиста (белая)"],
                    35,
                    ["en" => "White branded merch tee", "ru" => "Белая фирменная футболка мерча"],
                ],
                [
                    ["en" => "Oversize Logo Tee", "ru" => "Футболка oversize с логотипом"],
                    40,
                    ["en" => "Oversized streetwear style", "ru" => "Уличный стиль — oversize крой"],
                ],
            ],

            "tshirts" => [
                [
                    ["en" => "Tour 2024 T-Shirt", "ru" => "Футболка тура 2024"],
                    45,
                    ["en" => "Tour official tee", "ru" => "Официальная футболка тура"],
                ],
                [
                    ["en" => "Graffiti Style Tee", "ru" => "Футболка в стиле граффити"],
                    39.99,
                    ["en" => "Urban style print", "ru" => "Принт в городском стиле"],
                ],
                [
                    ["en" => "Skull Art Tee", "ru" => "Футболка с черепом"],
                    42,
                    ["en" => "Dark rap aesthetic", "ru" => "Тёмная рэп-эстетика"],
                ],
            ],

            "hoodies" => [
                [
                    ["en" => "Signature Hoodie Black", "ru" => "Фирменное чёрное худи"],
                    70,
                    ["en" => "Premium heavy hoodie", "ru" => "Премиальное плотное худи"],
                ],
                [
                    ["en" => "Tour Hoodie 2024", "ru" => "Худи тура 2024"],
                    80,
                    ["en" => "Exclusive tour item", "ru" => "Эксклюзивный предмет тура"],
                ],
                [
                    ["en" => "Streetwear Hoodie", "ru" => "Худи стритвир"],
                    65,
                    ["en" => "Oversize urban hoodie", "ru" => "Городское худи oversize"],
                ],
            ],

            "caps" => [
                [
                    ["en" => "Logo Cap Black", "ru" => "Чёрная кепка с логотипом"],
                    25,
                    ["en" => "Classic snapback", "ru" => "Классический снапбэк"],
                ],
                [
                    ["en" => "Embroidered Cap", "ru" => "Кепка с вышивкой"],
                    30,
                    ["en" => "High quality embroidery", "ru" => "Высококачественная вышивка"],
                ],
                [
                    ["en" => "Flat Brim Cap", "ru" => "Кепка с прямым козырьком"],
                    28,
                    ["en" => "Street style cap", "ru" => "Кепка в уличном стиле"],
                ],
            ],

            "accessories" => [
                [
                    ["en" => "Wristband Set", "ru" => "Набор браслетов"],
                    12,
                    ["en" => "Rubber band set", "ru" => "Набор резиновых браслетов"],
                ],
                [
                    ["en" => "Artist Keychain", "ru" => "Брелок артиста"],
                    9.99,
                    ["en" => "Metal keychain", "ru" => "Металлический брелок"],
                ],
                [
                    ["en" => "Phone Grip Holder", "ru" => "Держатель-грип для телефона"],
                    7.99,
                    ["en" => "Phone accessory", "ru" => "Аксессуар для телефона"],
                ],
            ],

            "stickers" => [
                [
                    ["en" => "Sticker Pack 1", "ru" => "Набор стикеров 1"],
                    5.99,
                    ["en" => "5 stickers", "ru" => "5 стикеров"],
                ],
                [
                    ["en" => "Sticker Pack 2", "ru" => "Набор стикеров 2"],
                    6.99,
                    ["en" => "10 stickers", "ru" => "10 стикеров"],
                ],
                [
                    ["en" => "Logo Sticker XL", "ru" => "Большой стикер с логотипом"],
                    3.99,
                    ["en" => "Single logo sticker", "ru" => "Один большой стикер с логотипом"],
                ],
            ],

            "posters" => [
                [
                    ["en" => "A2 Tour Poster", "ru" => "Туровый постер A2"],
                    14.99,
                    ["en" => "High-quality print", "ru" => "Высококачественная печать"],
                ],
                [
                    ["en" => "Artist Portrait Poster", "ru" => "Постер-портрет артиста"],
                    18.99,
                    ["en" => "Matte finish poster", "ru" => "Матовый постер"],
                ],
                [
                    ["en" => "Graffiti Poster", "ru" => "Постер граффити"],
                    16.50,
                    ["en" => "Street art style", "ru" => "Стиль уличного искусства"],
                ],
            ],

            "vinyl" => [
                [
                    ["en" => "Album Vinyl Black", "ru" => "Винил альбома (чёрный)"],
                    45,
                    ["en" => "Standard vinyl edition", "ru" => "Стандартное виниловое издание"],
                ],
                [
                    ["en" => "Album Vinyl Color Edition", "ru" => "Винил альбома (цветное издание)"],
                    55,
                    ["en" => "Marble color vinyl", "ru" => "Мраморный цвет винила"],
                ],
                [
                    ["en" => "Instrumental Vinyl", "ru" => "Инструментальный винил"],
                    40,
                    ["en" => "Instrumental release", "ru" => "Инструментальная версия"],
                ],
            ],

            "signed-merch" => [
                [
                    ["en" => "Signed T-Shirt", "ru" => "Футболка с подписью"],
                    120,
                    ["en" => "Limited signed edition", "ru" => "Лимитированная подписанная версия"],
                ],
                [
                    ["en" => "Signed Album CD", "ru" => "CD альбома с подписью"],
                    90,
                    ["en" => "Artist signature", "ru" => "Подпись артиста"],
                ],
                [
                    ["en" => "Signed Poster", "ru" => "Постер с подписью"],
                    150,
                    ["en" => "Collector’s item", "ru" => "Коллекционный предмет"],
                ],
            ],

            "limited-edition" => [
                [
                    ["en" => "Limited Hoodie Gold Edition", "ru" => "Лимитированное худи Gold Edition"],
                    150,
                    ["en" => "Rare drop", "ru" => "Редкий дроп"],
                ],
                [
                    ["en" => "Limited Vinyl Gold", "ru" => "Лимитированный винил Gold"],
                    200,
                    ["en" => "Ultra rare collector vinyl", "ru" => "Ультра-редкий коллекционный винил"],
                ],
                [
                    ["en" => "Tour Collector Box", "ru" => "Коллекционный туровый набор"],
                    250,
                    ["en" => "Premium collector bundle", "ru" => "Премиальный коллекционный набор"],
                ],
            ],

        ];

        foreach ($catalog as $categorySlug => $products) {

            $category = Category::where("slug", $categorySlug)->first();

            if (!$category) continue;

            foreach ($products as [$name, $price, $description]) {
                Product::create([
                    "name" => [
                        "en" => $name["en"],
                        "ru" => $name["ru"],
                    ],
                    "slug" => Str::slug($name["en"]),
                    "description" => [
                        "en" => $description["en"],
                        "ru" => $description["ru"],
                    ],
                    "price" => $price,
                    "sale_price" => null,
                    "quantity" => rand(0, 300),
                    "image" => "cap.webp",
                    "category_id" => $category->id,
                ]);
            }
        }
    }
}
