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
        Schema::table('organization_events', function (Blueprint $table) {
            $table->string('banner_image')->nullable()->after('event_name');
            $table->string('location')->nullable()->after('event_date');
            $table->dropColumn('event_time');
            $table->time('event_time_start')->nullable()->after('event_date');
            $table->time('event_time_end')->nullable()->after('event_time_start');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organization_events', function (Blueprint $table) {
            $table->dropColumn(['banner_image', 'location', 'event_time_start', 'event_time_end']);
            $table->time('event_time')->nullable();
        });
    }
};
