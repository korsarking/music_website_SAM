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
            $table->string("name", 50);
            $table->string("slug", 50);
            $table->text("description")->nullable();
            $table->decimal("price", 16, 2);
            $table->decimal("sale_price", 16, 2)->nullable();
            $table->mediumInteger("quantity")->nullable();
            $table->string("image")->nullable();
            $table->foreignId("category_id")->constrained()->cascadeOnDelete();
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
