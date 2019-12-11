<?php
/**
 * User: 林松
 * Date: 2019/12/11
 * Time: 上午 11:15
 */

namespace App\Modules\Common\Middleware;

use App\Exceptions\Common\UnauthorizedApiException;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\Authenticate;

class JWTAuthenticate extends Authenticate
{
    /**
     * 重写鉴权失败处理
     * @param Request $request
     * User: 林松    Date: 2019/12/11
     */
    public function authenticate(Request $request)
    {
        $this->checkForToken($request);

        try {
            if (!$this->auth->parseToken()->authenticate()) {
                throw new UnauthorizedApiException();
            }
        } catch (JWTException $e) {
            throw new UnauthorizedApiException(['message' => $e->getMessage()]);
        }
    }


    /**
     * 检查token
     * @param Request $request
     * User: 林松    Date: 2019/12/11
     */
    public function checkForToken(Request $request)
    {
        if (!$this->auth->parser()->setRequest($request)->hasToken()) {
            throw new UnauthorizedApiException(['message' => trans('tips.token.not_exist')]);
        }
    }
}
