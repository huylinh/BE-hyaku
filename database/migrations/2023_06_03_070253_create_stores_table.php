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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('business_hour');
            $table->boolean('air_condition');
            $table->boolean('parking_lot');
            $table->string('introduction')->nullable();
            $table->string('picture')->nullable();
            $table->unsignedBigInteger('owner_id');
            $table->string('coordinates');
            $table->integer('max_capacity');
            $table->foreign('owner_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
