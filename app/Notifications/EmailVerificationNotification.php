<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Cache;

class EmailVerificationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }


    /**
     * 生成用户验证缓存，并发送邮件
     * @param $notifiable
     * @return MailMessage
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function toMail($notifiable)
    {
        $token = str_random(16);
        $url   = route('email_verification.verify', ['email' => $notifiable->email, 'token' => $token]);
        Cache::set('email_verification_' . $notifiable->email, $token, 30);

        return (new MailMessage)->greeting($notifiable->name.'您好：')
            ->subject('注册成功，请验证您的邮箱')
            ->line('请点击下方链接验证您的邮箱')
            ->action('验证', $url);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [//
        ];
    }
}
