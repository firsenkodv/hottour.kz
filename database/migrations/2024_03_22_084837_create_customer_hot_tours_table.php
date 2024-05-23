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
        Schema::create('customer_hot_tours', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('img')->nullable();
            $table->string('procent')->nullable();
            $table->string('cityname')->nullable();
            $table->string('countryname')->nullable();
            $table->string('published')->default(1);
            $table->string('city');
            $table->string('country');
            $table->json('params')->nullable();
            $table->integer('sorting')->default(999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_hot_tours');
    }
};
