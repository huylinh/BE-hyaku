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
            $table->enum('status', ['pending', 'rejected', 'accepted']);
            $table->string('name');
            $table->string('address');
            $table->string('business_hour');
            $table->boolean('air_condition');
            $table->boolean('parking_lot');
            $table->string('introduction')->nullable();
            $table->unsignedBigInteger('owner_id');
            $table->string('coordinates');
            $table->integer('max_capacity');
            $table->string('front_picture')->nullable();
            $table->string('view_picture')->nullable();
            $table->string('inside_picture')->nullable();
            $table->string('ac_picture')->nullable();
            $table->string('parking_lot_picture')->nullable();
            $table->string('business_license_pic')->nullable();
            $table->timestamps();
            $table->timestamp('confirmed_at')->nullable();
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
