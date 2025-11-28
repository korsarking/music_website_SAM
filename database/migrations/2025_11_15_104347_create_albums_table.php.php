<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("albums", function (Blueprint $table) {
            $table->id();
            $table->string("title", 50);
            $table->string("slug_album")->unique();
            $table->text("description")->nullable();
            $table->string("path_image")->nullable();
            $table->date("released_at")->nullable();
            $table->unsignedInteger("views")->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("albums");
    }
};
