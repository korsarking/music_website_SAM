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
                ["Rap Artist T-Shirt Black", 35, "Classic black rap merch tee"],
                ["Rap Artist T-Shirt White", 35, "White branded merch tee"],
                ["Oversize Logo Tee", 40, "Oversized streetwear style"],
            ],

            "tshirts" => [
                ["Tour 2024 T-Shirt", 45, "Tour official tee"],
                ["Graffiti Style Tee", 39.99, "Urban style print"],
                ["Skull Art Tee", 42, "Dark rap aesthetic"],
            ],

            "hoodies" => [
                ["Signature Hoodie Black", 70, "Premium heavy hoodie"],
                ["Tour Hoodie 2024", 80, "Exclusive tour item"],
                ["Streetwear Hoodie", 65, "Oversize urban hoodie"],
            ],

            "caps" => [
                ["Logo Cap Black", 25, "Classic snapback"],
                ["Embroidered Cap", 30, "High quality embroidery"],
                ["Flat Brim Cap", 28, "Street style cap"],
            ],

            "accessories" => [
                ["Wristband Set", 12, "Rubber band set"],
                ["Artist Keychain", 9.99, "Metal keychain"],
                ["Phone Grip Holder", 7.99, "Phone accessory"],
            ],

            "stickers" => [
                ["Sticker Pack 1", 5.99, "5 stickers"],
                ["Sticker Pack 2", 6.99, "10 stickers"],
                ["Logo Sticker XL", 3.99, "Single logo sticker"],
            ],

            "posters" => [
                ["A2 Tour Poster", 14.99, "High-quality print"],
                ["Artist Portrait Poster", 18.99, "Matte finish poster"],
                ["Graffiti Poster", 16.50, "Street art style"],
            ],

            "vinyl" => [
                ["Album Vinyl Black", 45, "Standard vinyl edition"],
                ["Album Vinyl Color Edition", 55, "Marble color vinyl"],
                ["Instrumental Vinyl", 40, "Instrumental release"],
            ],

            "signed-merch" => [
                ["Signed T-Shirt", 120, "Limited signed edition"],
                ["Signed Album CD", 90, "Artist signature"],
                ["Signed Poster", 150, "Collector’s item"],
            ],

            "limited-edition" => [
                ["Limited Hoodie Gold Edition", 150, "Rare drop"],
                ["Limited Vinyl Gold", 200, "Ultra rare collector vinyl"],
                ["Tour Collector Box", 250, "Premium collector bundle"],
            ],

        ];

        foreach ($catalog as $categorySlug => $products) {

            $category = Category::where("slug", $categorySlug)->first();

            if (!$category) continue;

            foreach ($products as [$name, $price, $description]) {
                Product::create([
                    "name" => $name,
                    "slug" => Str::slug($name),
                    "description" => $description,
                    "price" => $price,
                    "sale_price" => null,
                    "quantity" => rand(0, 300),
                    "image" => null,
                    "category_id" => $category->id,
                ]);
            }
        }
    }
}
