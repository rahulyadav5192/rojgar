<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->timestamps();
        });

        Schema::create('conference_contents', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('date_time')->nullable();
            $table->string('speakers_text')->nullable();
            $table->string('seats_text')->nullable();
            $table->timestamps();
        });

        Schema::create('why_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('card1_title')->nullable();
            $table->text('card1_desc')->nullable();
            $table->string('card2_title')->nullable();
            $table->text('card2_desc')->nullable();
            $table->string('card3_title')->nullable();
            $table->text('card3_desc')->nullable();
            $table->string('card4_title')->nullable();
            $table->text('card4_desc')->nullable();
            $table->string('card5_title')->nullable();
            $table->text('card5_desc')->nullable();
            $table->string('card6_title')->nullable();
            $table->text('card6_desc')->nullable();
            $table->timestamps();
        });

        Schema::create('counter_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('speakers_count')->default(0);
            $table->unsignedInteger('seats_count')->default(0);
            $table->unsignedInteger('sponsors_count')->default(0);
            $table->unsignedInteger('sessions_count')->default(0);
            $table->timestamps();
        });

        Schema::create('speakers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_contents');
        Schema::dropIfExists('conference_contents');
        Schema::dropIfExists('why_sections');
        Schema::dropIfExists('counter_contents');
        Schema::dropIfExists('speakers');
    }
};
