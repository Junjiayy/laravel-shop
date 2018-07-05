<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request验证基类
 * Class Request
 * @package App\Http\Requests
 */
class Request extends FormRequest
{
    /**
     * 表示开启验证
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
