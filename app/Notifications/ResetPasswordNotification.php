<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hola!')
            ->subject('Recupera tu contraseña') // Personaliza el asunto aquí
            ->line('Has recibido este correo porque hemos recibido una solicitud de restablecimiento de contraseña para tu cuenta.')
            ->action('Restablecer Contraseña', url(config('app.url') . route('password.reset', $this->token, false)))
            ->salutation('Saludos!')
            ->line('Si no solicitaste un restablecimiento de contraseña, no se requiere ninguna acción adicional.')
            ->line('El enlace expirará en 30 minutos');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
