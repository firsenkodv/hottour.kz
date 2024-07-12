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
        Schema::table('hotels', function (Blueprint $table) {
            $table->text('territory')->nullable();
            $table->text('inroom')->nullable();
            $table->text('roomtypes')->nullable();
            $table->text('beach')->nullable();
            $table->text('servicefree')->nullable();
            $table->text('servicepay')->nullable();
            $table->text('animation')->nullable();
            $table->text('child')->nullable();
            $table->text('meallist')->nullable();
            $table->string('square')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            //
        });
    }
};
