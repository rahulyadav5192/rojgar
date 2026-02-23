<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->index(['status', 'start_date'], 'events_status_start_date_idx');
            $table->index(['featured', 'status', 'start_date'], 'events_featured_status_start_date_idx');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->index(['status', 'published_at', 'created_at'], 'blogs_status_published_created_idx');
        });

        Schema::table('gallery_images', function (Blueprint $table) {
            $table->index('created_at', 'gallery_images_created_at_idx');
        });

        Schema::table('speakers', function (Blueprint $table) {
            $table->index(['sort_order', 'id'], 'speakers_sort_order_id_idx');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex('events_status_start_date_idx');
            $table->dropIndex('events_featured_status_start_date_idx');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropIndex('blogs_status_published_created_idx');
        });

        Schema::table('gallery_images', function (Blueprint $table) {
            $table->dropIndex('gallery_images_created_at_idx');
        });

        Schema::table('speakers', function (Blueprint $table) {
            $table->dropIndex('speakers_sort_order_id_idx');
        });
    }
};

