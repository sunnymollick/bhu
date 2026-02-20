<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactReplyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $replySubject;
    public $replyMessage;

    /**
     * Create a new message instance.
     */
    public function __construct(Contact $contact, $replySubject, $replyMessage)
    {
        $this->contact = $contact;
        $this->replySubject = $replySubject;
        $this->replyMessage = $replyMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->replySubject,
            replyTo: ['admin@bengalihindunity.com'], // Static for now, will be dynamic later
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-reply',
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
