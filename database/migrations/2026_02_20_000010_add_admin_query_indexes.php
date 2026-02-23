<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->index('start_date', 'events_start_date_idx');
            $table->index('created_at', 'events_created_at_idx');
            $table->index('title', 'events_title_idx');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->index('created_at', 'blogs_created_at_idx');
        });

        Schema::table('event_registrations', function (Blueprint $table) {
            $table->index('created_at', 'event_registrations_created_at_idx');
            $table->index(['event_id', 'created_at'], 'event_registrations_event_id_created_at_idx');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->index('created_at', 'contacts_created_at_idx');
        });

        Schema::table('subscribers', function (Blueprint $table) {
            $table->index('created_at', 'subscribers_created_at_idx');
        });

        Schema::table('sponsors', function (Blueprint $table) {
            $table->index('created_at', 'sponsors_created_at_idx');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex('events_start_date_idx');
            $table->dropIndex('events_created_at_idx');
            $table->dropIndex('events_title_idx');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropIndex('blogs_created_at_idx');
        });

        Schema::table('event_registrations', function (Blueprint $table) {
            $table->dropIndex('event_registrations_created_at_idx');
            $table->dropIndex('event_registrations_event_id_created_at_idx');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIndex('contacts_created_at_idx');
        });

        Schema::table('subscribers', function (Blueprint $table) {
            $table->dropIndex('subscribers_created_at_idx');
        });

        Schema::table('sponsors', function (Blueprint $table) {
            $table->dropIndex('sponsors_created_at_idx');
        });
    }
};
