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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_category_id'); // Change this to unsignedBigInteger
            $table->string('game_name');
            $table->string('game_code');
            $table->string('game_status');
            $table->string('game_image');
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('game_category_id')->references('id')->on('game_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
