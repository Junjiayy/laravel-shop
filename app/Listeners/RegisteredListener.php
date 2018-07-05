<?php

namespace App\Listeners;

use App\Notifications\EmailVerificationNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * 用户注册监听器
 * Class RegisteredListener
 * @package App\Listeners
 */
class RegisteredListener implements ShouldQueue
{
    /**
     * 用户注册成功后以后  触发邮件验证通知
     * @param Registered $event
     */
    public function handle(Registered $event)
    {
        $user = $event->user;
        $user->notify(new EmailVerificationNotification());
    }
}
