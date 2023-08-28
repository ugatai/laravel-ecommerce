<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * @return void
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('secondary_category_id');
            $table->unsignedBigInteger('image_1')->nullable();
            $table->unsignedBigInteger('image_2')->nullable();
            $table->unsignedBigInteger('image_3')->nullable();
            $table->unsignedBigInteger('image_4')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->text('information')->nullable();
            $table->tinyInteger('status');
            $table->unsignedBigInteger('order');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('shop_id')
                ->references('id')
                ->on('shops');
            $table->foreign('secondary_category_id')
                ->references('id')
                ->on('secondary_categories');
            $table->foreign('image_1')
                ->references('id')
                ->on('images');
            $table->foreign('image_2')
                ->references('id')
                ->on('images');
            $table->foreign('image_3')
                ->references('id')
                ->on('images');
            $table->foreign('image_4')
                ->references('id')
                ->on('images');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
