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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('stars');
            $table->text('comment')->nullable();
            $table->string('picture')->nullable();
            $table->unsignedBigInteger('history_id');
            $table->unsignedBigInteger('store_id');
            $table->foreign('history_id')->references('id')->on('histories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('store_id')->references('id')->on('stores')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
