<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Album extends Model
{

    use HasFactory;

    protected $fillable = [
        "title",
        "slug_album",
        "description",
        "path_image",
        "released_at",
        "views",
    ];

    protected $casts = [
        "released_at" => "date",
    ];

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($album) {
            if (empty($album->slug_album)) {
                $album->slug_album = Str::slug($album->title);
            }
        });

        static::updating(function ($album) {
            if ($album->isDirty('title') && filled($album->title)) {
                $album->slug_album = Str::slug($album->title);
            }
        });
    }
}
