<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ReferenceNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $referrer;
    public $newUser;
    public $verifyUrl;
    public $rejectUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(User $referrer, User $newUser, string $verifyUrl, string $rejectUrl)
    {
        $this->referrer = $referrer;
        $this->newUser = $newUser;
        $this->verifyUrl = $verifyUrl;
        $this->rejectUrl = $rejectUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Registration Using Your Reference',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reference-notification',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
