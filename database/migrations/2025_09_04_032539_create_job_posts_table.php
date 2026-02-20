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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_category_id')->nullable();
            $table->unsignedBigInteger('job_industry_id')->nullable();
            $table->string('company');
            $table->string('job_title');
            $table->enum('job_type', ['full_time', 'part_time']);
            $table->enum('work_mode', ['remote', 'in_person']);
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->date('deadline')->nullable();
            $table->text('about')->nullable();
            $table->text('requirements')->nullable();
            $table->text('preferred_experience')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('why_join_us')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('set null');
            $table->foreign('job_industry_id')->references('id')->on('job_industries')->onDelete('set null');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('set null');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
