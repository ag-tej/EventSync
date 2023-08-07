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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organizer_id')->references('id')->on('users');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('tagline')->nullable();
            $table->longText('description')->nullable();
            $table->string('category');
            $table->enum('mode', ['In-Person', 'Online', 'Hybrid'])->default('In-Person');
            $table->boolean('isPublished')->default(0);
            $table->integer('approx_participants')->nullable();
            $table->integer('team_size')->nullable();
            $table->string('venue')->nullable();
            $table->integer('percent_complete')->default(10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
