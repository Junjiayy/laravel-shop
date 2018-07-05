<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class UserAddressesController
 * @package App\Http\Controllers
 */
class UserAddressesController extends Controller
{
    /**
     * 显示当前用户下所有可用地址
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('user_addresses.index', [
            'addresses' => $request->user()->addresses
        ]);
    }
}
