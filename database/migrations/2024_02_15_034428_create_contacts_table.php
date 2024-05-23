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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('label')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('skype')->nullable();
            $table->string('yandex_map')->nullable();
            $table->text('text')->nullable();


            $table->json('data_phone')->nullable();
            $table->json('data_email')->nullable();

            $table->string('published')->default(1);

            $table->integer('sorting')->default(999);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
