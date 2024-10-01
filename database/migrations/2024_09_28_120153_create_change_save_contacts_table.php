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
        Schema::create('change_save_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('key');
            $table->json('phone')->nullable();
            $table->json('whatsapp')->nullable();
            $table->json('telegram')->nullable();

            $table->string('phone_mode')->nullable();
            $table->string('whatsapp_mode')->nullable();
            $table->string('telegram_mode')->nullable();

            $table->string('phone_published')->default(1);
            $table->string('whatsapp_published')->default(1);
            $table->string('telegram_published')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('change_save_contacts');
    }
};
