<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('temples', function (Blueprint $table) {
            // Every query filters on both columns — this composite index covers them
            $table->index(['status', 'approval_status'], 'temples_status_approval_index');
        });

        Schema::table('temple_activities', function (Blueprint $table) {
            // Speeds up whereHas('activities') lookups used in filtering
            $table->index(['temple_id', 'activity_id'], 'temple_activities_composite_index');
        });
    }

    public function down(): void
    {
        Schema::table('temples', function (Blueprint $table) {
            $table->dropIndex('temples_status_approval_index');
        });

        Schema::table('temple_activities', function (Blueprint $table) {
            $table->dropIndex('temple_activities_composite_index');
        });
    }
};
