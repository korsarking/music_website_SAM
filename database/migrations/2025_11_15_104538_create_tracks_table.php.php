<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("tracks", function (Blueprint $table) {
            $table->id();
            $table->foreignId("album_id")->nullable()->constrained()->nullOnDelete();
            $table->json("title");
            $table->string("slug_track")->unique()->nullable();
            $table->unsignedInteger("duration")->nullable();
            $table->string("audio_url")->nullable();
            $table->unsignedInteger("rating_votes")->default(0);
            $table->unsignedInteger("rating_total")->default(0);
            $table->index("album_id");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("tracks");
    }
};


