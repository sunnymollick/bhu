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
        Schema::table('banners', function (Blueprint $table) {
            $table->string('title')->nullable()->after('banner_text');
            $table->string('title_bn')->nullable()->after('title');
            $table->text('subtitle')->nullable()->after('title_bn');
            $table->text('subtitle_bn')->nullable()->after('subtitle');
            $table->string('button_text_1')->nullable()->after('subtitle_bn');
            $table->string('button_link_1')->nullable()->after('button_text_1');
            $table->string('button_text_2')->nullable()->after('button_link_1');
            $table->string('button_link_2')->nullable()->after('button_text_2');
            $table->string('location')->default('home')->after('page_id'); // home, about, contact, etc.

            $table->index('location');
            $table->index(['status', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'title_bn',
                'subtitle',
                'subtitle_bn',
                'button_text_1',
                'button_link_1',
                'button_text_2',
                'button_link_2',
                'location'
            ]);
        });
    }
};
