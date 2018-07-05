<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    /**
     * 网站首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function root()
    {
        return view('pages.root');
    }

    /**
     * 显示邮件认证提示
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function emailVerifyNotice( Request $request )
    {
        return view('pages.email_verify_notice');
    }
}
