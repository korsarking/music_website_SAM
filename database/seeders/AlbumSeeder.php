<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Track;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $musicCategory = Category::where("slug", "music")->firstOrFail();

        Album::factory(5)->create()->each(function ($album) use ($musicCategory) {
            Product::create([
                "name" => [
                    "en" => $album->getTranslation("title", "en"),
                    "ru" => $album->getTranslation("title", "ru"),
                ],
                "slug" => $album->slug_album,
                "description" => [
                    "en" => $album->getTranslation("description", "en") ?? "Digital album",
                    "ru" => $album->getTranslation("description", "ru") ?? "Цифровой альбом",
                ],
                "price" => $album->price,
                "sale_price" => $album->sale_price,
                "quantity" => null,
                "image" => $album->path_image,
                "category_id" => $musicCategory->id,
                "album_id" => $album->id,
                "is_digital" => true,
                "created_at"  => now(),
                "updated_at"  => now(),
            ]);

            Track::factory(rand(8, 15))->create([
                "album_id" => $album->id,
            ]);
        });
    }
}
