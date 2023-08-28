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
        Schema::create('secondary_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('primary_category_id');
            $table->string('name');
            $table->unsignedBigInteger('order');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('primary_category_id')
                ->references('id')
                ->on('primary_categories');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('secondary_categories');
    }
};
