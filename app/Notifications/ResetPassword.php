<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notification
{
    use Queueable;

    public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Сброс пароля от аккаунта')
                    ->line('Вы получили это письмо, потому что запросили сброс пароля для вашего аккаунта.')
                    ->action('Сбросить пароль', url('password/reset', $this->token))
                    ->line(Lang::get('Ссылка для сброс пароля действительна в течении :count минут.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
                    ->line(Lang::get('Если вы не запрашивали сброс пароля, то просто проигнорируйте это письмо.'))
                    ->line('Спасибо что пользуетесь нашим магазином!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
