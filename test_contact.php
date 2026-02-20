<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Contact;

echo "Testing Contact Model...\n\n";

$contact = Contact::first();

if ($contact) {
    echo "Contact ID: " . $contact->id . "\n";
    echo "Message Type: " . gettype($contact->message) . "\n";
    echo "Message Content:\n";
    print_r($contact->message);
} else {
    echo "No contacts found in database.\n";
}
