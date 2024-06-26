<?php

use App\Models\HotCategory;
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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('title_for_menu')->nullable();

            $table->string('img')->nullable();
            $table->string('imgflag')->nullable();
            $table->text('gallery')->nullable();
            $table->text('smalltext')->nullable();
            $table->text('text')->nullable();
            $table->string('pageimg1')->nullable();
            $table->text('text2')->nullable();
            $table->string('pageimg2')->nullable();
            $table->text('text3')->nullable();
            $table->string('published')->default(1);
            $table->json('params')->nullable();
            $table->foreignIdFor(HotCategory::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->integer('stars')->nullable();
            $table->string('rating')->nullable();
            $table->text('placement')->nullable();
            $table->text('desc')->nullable();
            $table->integer('imagescount')->nullable();
            $table->integer('regioncode')->nullable();
            $table->string('region')->nullable();
            $table->string('build')->nullable();
            $table->string('repair')->nullable();
            $table->string('coord')->nullable();


            $table->integer('country_id')->nullable();
            $table->integer('region_id')->nullable();

            $table->string('metatitle')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('sorting')->default(999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
