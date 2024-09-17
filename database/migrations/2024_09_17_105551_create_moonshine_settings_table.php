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
        Schema::create('moonshine_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->text('bonus')->nullable();
            $table->text('ball')->nullable();
            $table->text('cashback')->nullable();
            $table->string('fullAddress')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('sityAddress')->nullable();
            $table->string('idn')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moonshine_settings');
    }
};
