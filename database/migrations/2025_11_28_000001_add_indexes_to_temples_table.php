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
        Schema::table('temples', function (Blueprint $table) {
            // Index for status filtering (most common query)
            $table->index('status', 'temples_status_index');

            // Composite index for location-based filtering
            $table->index(['status', 'division_id'], 'temples_status_division_index');
            $table->index(['status', 'district_id'], 'temples_status_district_index');
            $table->index(['status', 'upazila_id'], 'temples_status_upazila_index');

            // Index for search queries
            $table->index('name', 'temples_name_index');
            $table->index('name_bn', 'temples_name_bn_index');

            // Index for map coordinates (not null filtering)
            $table->index(['latitude', 'longitude'], 'temples_coordinates_index');

            // Index for residential facility filter
            $table->index(['status', 'residential_facility'], 'temples_status_residential_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('temples', function (Blueprint $table) {
            $table->dropIndex('temples_status_index');
            $table->dropIndex('temples_status_division_index');
            $table->dropIndex('temples_status_district_index');
            $table->dropIndex('temples_status_upazila_index');
            $table->dropIndex('temples_name_index');
            $table->dropIndex('temples_name_bn_index');
            $table->dropIndex('temples_coordinates_index');
            $table->dropIndex('temples_status_residential_index');
        });
    }
};
