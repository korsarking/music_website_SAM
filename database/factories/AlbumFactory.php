<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlbumFactory extends Factory
{
    protected $model = Album::class;
    
    protected $images = [
        "album_1.webp",
        "album_2.webp",
        "album_3.webp",
        "album_4.webp",
        "album_5.webp",
    ];

    public function definition(): array
    {
        return [
            "title" => [
                'en' => $this->faker->unique()->sentence(3),
                'ru' => $this->faker->unique()->sentence(3),
            ],
            "description" => [
                'en' => $this->faker->paragraph(),
                'ru' => $this->faker->paragraph(),
            ],
            "slug_album"   => fn ($attributes) => \Str::slug($attributes["title"]["en"]),
            "released_at"  => $this->faker->dateTimeBetween("-10 years", "now"),
            "views"        => $this->faker->numberBetween(1000, 75000),
            "price"        => $this->faker->randomFloat(2, 7.99, 24.99),
            "sale_price"   => $this->faker->boolean(35) ? $this->faker->randomFloat(2, 2.99, 9.99) : null,
            "is_digital"   => true,
            "is_for_sale"  => $this->faker->boolean(95),
        ];
    }

    public function configure()
    {
        return $this->sequence(fn ($sequence) => [
            'path_image' => $this->images[$sequence->index % count($this->images)],
        ]);
    }
}
