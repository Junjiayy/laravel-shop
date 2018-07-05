<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\UserAddress;
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

    /**
     * 显示添加地址的表单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user_addresses.create_and_edit', ['address' => new UserAddress()]);
    }

    /**
     * 添加地址 入库
     * @param UserAddressRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserAddressRequest $request)
    {
        $request->user()->addresses()->create($request->only([
            'province', 'city', 'district', 'address', 'zip',
            'contact_name', 'contact_phone',
        ]));

        return redirect()->route('user_addresses.index');
    }
}
