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
            $table->string('playstation_id');
            $table->string('name');
            $table->string('localized_name');
            $table->time('play_duration')->nullable();
            $table->dateTime('first_played_date_time')->nullable();
            $table->dateTime('last_played_date_time')->nullable();
            $table->integer('play_count')->nullable();
            $table->string('category')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
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
