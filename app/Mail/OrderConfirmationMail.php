<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * La commande concernée.
     */
    public Order $order;

    /**
     * Création du mail.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Sujet de l'email.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de votre commande ' . $this->order->order_number,
        );
    }

    /**
     * Vue HTML utilisée pour l'email.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.orders.confirmation',
        );
    }

    /**
     * Pièces jointes éventuelles.
     */
    public function attachments(): array
    {
        return [];
    }
}