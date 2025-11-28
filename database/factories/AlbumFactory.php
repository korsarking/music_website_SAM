<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition(): array
    {
        return [
            "title"       => $this->faker->sentence(3),
            "description" => $this->faker->paragraph(),
            "path_image" => "album/default.jpg",
            "slug_album" => uniqid(),
            "released_at" => $this->faker->dateTimeBetween("-10 years", "now"),
            "views"       => $this->faker->numberBetween(0, 50000),
        ];
    }
}
