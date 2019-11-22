<?php
/**
 * User: 林松
 * Date: 2019/11/1
 * Time: 16:20
 */

namespace App\Modules\Common\Traits;

use Illuminate\Support\Str;

trait LaravelTrait
{
    /**
     * 获取当前模块名
     *
     * @return string
     */
    protected function getCurrentModuleName()
    {
        return $this->getCurrentAction()['module'];
    }

    /**
     * 获取当前控制器名
     *
     * @return string
     */
    protected function getCurrentControllerName()
    {
        return $this->getCurrentAction()['controller'];
    }

    /**
     * 获取当前方法名
     *
     * @return string
     */
    protected function getCurrentMethodName()
    {
        return $this->getCurrentAction()['method'];
    }

    /**
     * 获取当前控制器与方法
     *
     * @return array
     */
    protected function getCurrentAction()
    {
        $action = request()->route()->getAction();

        list($app, $module_path, $module_name) = explode('\\', $action['namespace']);

        $action = str_replace($action['namespace'] . '\\', '', $action['controller']);

        $field = explode('\\', $action);

        if (count($field) > 1) {
            $actions = explode('\\', $action);
            $action = 'Http\\Controllers\\' . $actions[1];
        } else {
            $action = 'Http\\Controllers\\' . $action;
        }

        list($module, $_, $action) = explode('\\', $action);

        list($controller, $action) = explode('@', $action);

        if ($app && $module_path == 'Modules') {
            $module = $module_name; // 获取模块名
        }

        return ['module' => $module, 'controller' => Str::studly($controller), 'method' => $action];
    }

}
