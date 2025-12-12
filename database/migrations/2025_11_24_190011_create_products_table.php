<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("products", function (Blueprint $table) {
            $table->id();
            $table->json("name");
            $table->string("slug", 50);
            $table->json("description")->nullable();
            $table->decimal("price", 16, 2);
            $table->decimal("sale_price", 16, 2)->nullable();
            $table->mediumInteger("quantity")->nullable();
            $table->string("image")->nullable();
            $table->foreignId("category_id")->constrained()->cascadeOnDelete();
            $table->foreignId("album_id")->nullable()->constrained("albums")->nullOnDelete();
            $table->boolean("is_digital")->default(false);
            $table->index("album_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("products");
    }
};
