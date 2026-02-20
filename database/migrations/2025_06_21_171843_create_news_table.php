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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->dateTime('date_time');
            $table->text('what');
            $table->text('who');
            $table->text('when');
            $table->text('where');
            $table->text('why');
            $table->text('how');
            $table->text('victim_testimony');
            $table->text('witness_statement')->nullable();
            $table->text('opposition_reaction')->nullable();
            $table->text('government_response')->nullable();
            $table->text('media_coverage')->nullable();
            $table->json('attachments')->nullable();
            $table->string('contact')->nullable();
            $table->boolean('is_confidential')->default(false);
            $table->unsignedBigInteger('created_by');
            $table->enum('status', ['pending', 'approved', 'disapproved'])->default('pending');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();

            $table->text('final_news')->nullable();
            $table->unsignedBigInteger('edited_by')->nullable();
            $table->unsignedBigInteger('composed_by')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('edited_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('composed_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
