<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    public array $translatable = ["name", "description"];
    
    protected $fillable = [
        "name",
        "slug",
        "description",
        "price",
        "sale_price",
        "quantity",
        "image",
        "category_id",
        "album_id",
        "is_digital",
    ];

    protected $casts = [
        "name" => "array",
        "is_digital" => "boolean",
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function getImagePathAttribute()
    {
        if ($this->album_id && $this->album?->path_image) {
            return asset("storage/albums/" . $this->album->path_image);
        } else {
            return asset("storage/products/" . $this->image);
        }
    }

    public function getProductUrlAttribute()
    {
        if ($this->album_id && $this->album?->slug) {
            return route("album.show", $this->album->slug);
        }

        return route("show-product", $this->slug);
    }
}
