<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const DEFAULT_MAP_EMBED_URL = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15864.15480778837!2d-77.44908382752939!3d38.953293865566366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6775cb22a9fa1341!2sThe+Firkin+%26+Fox!5e0!3m2!1sen!2sbd!4v1543773685573';

    public function up(): void
    {
        Schema::table('footer_contents', function (Blueprint $table) {
            $table->text('google_map_embed_url')->nullable()->after('email');
        });

        DB::table('footer_contents')
            ->whereNull('google_map_embed_url')
            ->orWhere('google_map_embed_url', '')
            ->update(['google_map_embed_url' => self::DEFAULT_MAP_EMBED_URL]);
    }

    public function down(): void
    {
        Schema::table('footer_contents', function (Blueprint $table) {
            $table->dropColumn('google_map_embed_url');
        });
    }
};
