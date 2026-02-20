<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('gender');
            $table->string('aadhaar_number')->nullable();
            $table->string('phone_number');
            $table->string('email_address');
            $table->string('college_university')->nullable();
            $table->string('qualification')->nullable();
            $table->string('referred_by')->nullable();
            $table->boolean('has_certifications')->default(false);
            $table->text('certifications_detail')->nullable();
            $table->string('resume')->nullable();
            $table->string('passport_number')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};
