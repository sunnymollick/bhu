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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_bn')->nullable(); 
            $table->text('description')->nullable();
            $table->text('description_bn')->nullable(); 
            $table->timestamp('scheduled_at')->nullable();
            $table->unsignedBigInteger('activity_category_id');
            $table->foreign('activity_category_id')->references('id')->on('activity_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
