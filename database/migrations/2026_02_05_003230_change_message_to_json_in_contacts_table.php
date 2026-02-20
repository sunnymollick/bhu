<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, convert existing text messages to JSON format
        $contacts = DB::table('contacts')->get();

        foreach ($contacts as $contact) {
            $messageArray = [
                [
                    'sender' => 'user',
                    'message' => $contact->message,
                    'timestamp' => $contact->created_at
                ]
            ];

            DB::table('contacts')
                ->where('id', $contact->id)
                ->update(['message' => json_encode($messageArray)]);
        }

        // Now change column type to JSON
        Schema::table('contacts', function (Blueprint $table) {
            $table->json('message')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->text('message')->change();
        });
    }
};
