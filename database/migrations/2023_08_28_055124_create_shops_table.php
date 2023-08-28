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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('name');
            $table->text('information');
            $table->string('file_path');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_id')
                ->references('id')
                ->on('owners');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
