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
        Schema::table('job_posts', function (Blueprint $table) {
            // Covers the base filter: is_approved + location + category
            $table->index(['is_approved', 'division_id', 'district_id'], 'idx_jobs_approved_div_dist');
            $table->index(['is_approved', 'job_category_id', 'job_industry_id'], 'idx_jobs_approved_cat_ind');
            $table->index(['is_approved', 'job_type'], 'idx_jobs_approved_type');
            $table->index(['is_approved', 'work_mode'], 'idx_jobs_approved_mode');
        });
    }

    public function down(): void
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->dropIndex('idx_jobs_approved_div_dist');
            $table->dropIndex('idx_jobs_approved_cat_ind');
            $table->dropIndex('idx_jobs_approved_type');
            $table->dropIndex('idx_jobs_approved_mode');
        });
    }
};
