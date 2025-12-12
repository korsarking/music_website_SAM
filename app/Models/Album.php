<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Album extends Model
{

    use HasFactory, HasTranslations;

    public array $translatable = ["title", "description"];

    protected $fillable = [
        "title",
        "slug_album",
        "description",
        "path_image",
        "released_at",
        "views",
        "price",
        "sale_price",
        "is_digital",
        "is_for_sale",
    ];

    protected $casts = [
        "title" => "array",
        "released_at" => "date",
        "is_digital" => "boolean",
        "is_for_sale" => "boolean",
    ];

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($album) {
            if (empty($album->slug_album)) {
                $album->slug_album = Str::slug($album->getTranslation("title", "en"));
            }
        });

        static::updating(function ($album) {
            if ($album->isDirty("title")) {
                $album->slug_album = Str::slug($album->getTranslation("title", "en"));
            }
        });
    }
}
