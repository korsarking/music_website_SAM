<?php

namespace Database\Factories;

use App\Models\Track;
use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackFactory extends Factory
{
    protected $model = Track::class;

    public function definition(): array
    {
        return [
            "album_id"     => null,
            "title"        => $this->faker->sentence(2),
            "duration"     => $this->faker->numberBetween(120, 420),
            "audio_url"    => "tracks/lonely_day.flac",
            "slug_track"    => uniqid(),
            "rating_votes" => 0,
            "rating_total" => 0,
        ];
    }

    public function withAlbum(Album $album)
    {
        return $this->state(fn() => [
            "album_id" => $album->id,
        ]);
    }
}
