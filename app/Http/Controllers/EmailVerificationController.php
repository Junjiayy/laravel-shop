<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Http\Request;
use Exception;
use Cache;

/**
 * Class EmailVerificationController
 * @package App\Http\Controllers
 */
class EmailVerificationController extends Controller
{
    /**
     * 邮箱验证 成功后将字段改为true
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws Exception
     */
    public function verify(Request $request)
    {
        $email = $request->email;
        $token = $request->token;

        if (!$email || !$token) {
            throw new Exception('验证链接不正确');
        }

        if ($token != Cache::get('email_verification_' . $email)) {
            throw new Exception('验证链接不正确或已过期');
        }

        if (!$user = User::where('email', $email)->first()) {
            throw new Exception('用户不存在');
        }

        Cache::forget('email_verification_' . $email);
        $user->update(['email_verified' => true]);

        return view('pages.success', ['msg' => '邮箱验证成功']);
    }

    /**
     * 用户主动触发邮件验证  发送邮件
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws Exception
     */
    public function send(Request $request)
    {
        $user = $request->user();

        /* 如果用户已经发送过邮箱则提示用户 */
        if ($user->email_verified) {
            throw new Exception('你已经验证过邮箱了');
        }
        $user->notify(new EmailVerificationNotification());

        return view('pages.success', ['msg' => '邮件发送成功']);
    }
}
