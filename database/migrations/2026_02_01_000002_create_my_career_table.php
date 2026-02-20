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
        Schema::create('my_career', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Career Objective
            $table->text('career_objective')->nullable();

            // Multiple entries stored as JSON
            $table->json('education')->nullable(); // [{degree, institution, location, start_date, end_date, cgpa, major, minor}]
            $table->json('work_experience')->nullable(); // [{position, company, location, start_date, end_date, description}]
            $table->json('skills')->nullable(); // [{name, proficiency_level, proficiency_percentage}]
            $table->json('projects')->nullable(); // [{title, start_date, end_date, link, description, technologies}]
            $table->json('certifications')->nullable(); // [{title, issuing_organization, issue_date, credential_id}]
            $table->json('languages')->nullable(); // [{name, proficiency_level}]
            $table->json('professional_links')->nullable(); // [{platform, url, icon}]

            $table->timestamps();

            // Ensure one career profile per user
            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_career');
    }
};
