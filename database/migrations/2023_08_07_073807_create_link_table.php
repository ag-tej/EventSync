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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->references('id')->on('events');
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('discord_link')->nullable();
            $table->string('facebook_link');
            $table->string('instagram_link');
            $table->string('website_link')->nullable();
            $table->string('contact_email');
            $table->string('code_of_conduct')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
