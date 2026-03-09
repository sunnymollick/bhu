<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Composite index for the most common filter: status + division + district
        Schema::table('organizations', function (Blueprint $table) {
            $table->index(['status', 'division_id', 'district_id'], 'idx_org_status_division_district');
            $table->index(['status', 'organization_type'], 'idx_org_status_type');
        });

        // Composite index for whereHas lookups on the junction table
        Schema::table('organization_businesses', function (Blueprint $table) {
            $table->unique(['organization_id', 'business_id'], 'idx_orgbiz_org_biz');
        });
    }

    public function down(): void
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropIndex('idx_org_status_division_district');
            $table->dropIndex('idx_org_status_type');
        });

        Schema::table('organization_businesses', function (Blueprint $table) {
            $table->dropUnique('idx_orgbiz_org_biz');
        });
    }
};
