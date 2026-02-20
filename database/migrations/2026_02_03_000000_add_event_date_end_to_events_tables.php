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
        Schema::table('temple_events', function (Blueprint $table) {
            $table->date('event_date_end')->nullable()->after('event_date');
        });

        Schema::table('organization_events', function (Blueprint $table) {
            $table->date('event_date_end')->nullable()->after('event_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('temple_events', function (Blueprint $table) {
            $table->dropColumn('event_date_end');
        });

        Schema::table('organization_events', function (Blueprint $table) {
            $table->dropColumn('event_date_end');
        });
    }
};
