<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessageReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $replySubject,
        public string $replyBody,
        public Message $customerMessage,
    ) {
    }

    /**
     * Sujet de l'email.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->replySubject,
        );
    }

    /**
     * Vue utilisée pour l'email.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.message-reply',
        );
    }

    /**
     * Pièces jointes.
     */
    public function attachments(): array
    {
        return [];
    }
}