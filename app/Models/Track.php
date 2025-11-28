<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        "album_id",
        "title",
        "slug",
        "duration",
        "audio_url",
        "rating_votes",
        "rating_total",
    ];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function getRatingAttribute()
    {
        if ($this->rating_votes === 0) {
            return 0;
        }
        return round($this->rating_total / $this->rating_votes, 2);
    }

    public function rate(int $stars)
    {
        $this->rating_votes++;
        $this->rating_total += $stars;
        $this->save();
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($track) {
            if (empty($track->slug)) {
                $track->slug = Str::slug($track->title . "-" . uniqid());
            }
        });
    }
}
