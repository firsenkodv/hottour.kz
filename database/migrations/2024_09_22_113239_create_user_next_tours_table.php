<?php

use App\Models\User;
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
        Schema::create('user_next_tours', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('cookie')->nullable();
            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_next_tours');
    }
};
