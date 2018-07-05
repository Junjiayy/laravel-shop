<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

/**
 * 外部无效请求异常
 * Class InvalidRequestException
 * @package App\Exceptions
 */
class InvalidRequestException extends Exception
{
    /**
     * InvalidRequestException constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct(string $message = "", int $code = 400)
    {
        parent::__construct($message, $code);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function render(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json(['msg' => $this->message], $this->code);
        }

        return view('pages.error', ['msg' => $this->message]);
    }
}
