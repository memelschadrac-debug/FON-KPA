<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Token généré automatiquement par Laravel.
     */
    protected string $token;

    /**
     * Crée une nouvelle notification.
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Définit les canaux utilisés par la notification.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Construit l'e-mail de réinitialisation.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Réinitialisation de votre mot de passe - FON-KPA')
            ->view('emails.password-reset', [
                'url' => $url,
                'user' => $notifiable,
            ]);
    }
}