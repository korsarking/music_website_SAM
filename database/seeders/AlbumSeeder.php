<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Track;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::factory(5)->create()->each(function ($album) {
            Track::factory(rand(5, 12))->create([
                "album_id" => $album->id,
            ]);
        });

        Track::factory(10)->create();
    }
}
