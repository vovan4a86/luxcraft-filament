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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->string('h1')->nullable();
            $table->string('alias');
            $table->string('article')->nullable()->default(null);
            $table->float('price')->nullable();
            $table->string('sizes')->nullable()->default(null);
            $table->string('image')->nullable();
            $table->text('text')->nullable();
            $table->longText('chars')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->unsignedTinyInteger('inner_length')->nullable();
            $table->unsignedTinyInteger('inner_wide')->nullable();
            $table->unsignedTinyInteger('inner_height')->nullable();
            $table->unsignedMediumInteger('order')->nullable()->default(500);
            $table->boolean('published')->default(true);
            $table->boolean('in_stock')->default(true);
            $table->boolean('is_new')->default(false);
            $table->boolean('is_recommendation')->default(false);
            $table->boolean('is_action')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
