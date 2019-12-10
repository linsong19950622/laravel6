<?php

namespace App\Exceptions;

use App\Exceptions\Common\BaseException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        BaseException::class
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];


    /**
     * 处理异常-业务（写日志或者发送邮件等）
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     * User: 林松    Date: 2019/12/6
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * 响应
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return Response|\Symfony\Component\HttpFoundation\Response
     * User: 林松    Date: 2019/12/6
     */
    public function render($request, Exception $exception)
    {
        $code = $exception->getCode();
        $message = $exception->getMessage();

        if ($exception instanceof BaseException) {
            return new Response($message, $code);
        }

        return parent::render($request, $exception);
    }
}
