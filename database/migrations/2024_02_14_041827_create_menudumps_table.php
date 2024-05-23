<?php

use App\Models\Menudump;
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
        Schema::create('menudumps', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->string('published')->default(1);
            $table->json('params')->nullable();
            $table->integer('dump_id')->nullable();
            $table->foreignIdFor(Menudump::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->integer('sorting')->default(999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menudumps');
    }
};
