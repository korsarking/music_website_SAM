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
            $table->json("title");
            $table->string("slug_album")->unique();
            $table->string("path_image")->nullable();
            $table->date("released_at")->nullable();
            $table->decimal("price", 12, 2)->default(0);
            $table->decimal("sale_price", 12, 2)->nullable();
            $table->boolean("is_digital")->default(true);
            $table->boolean("is_for_sale")->default(true);
            $table->unsignedInteger("views")->default(0);
            $table->json("description")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("albums");
    }
};
