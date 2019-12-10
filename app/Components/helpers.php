<?php

use Illuminate\Support\Str;

/**
 * 全局方法
 */

/**
 * 获取当前模块名
 * @return string
 */
function getCurrentModuleName()
{
    return getCurrentAction()['module'];
}

/**
 * 获取当前控制器名
 * @return string
 */
function getCurrentControllerName()
{
    return getCurrentAction()['controller'];
}

/**
 * 获取当前方法名
 * @return string
 */
function getCurrentMethodName()
{
    return getCurrentAction()['method'];
}

/**
 * 获取当前控制器与方法
 * @return array
 */
function getCurrentAction()
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

/**
 * 固定json数据格式
 * @param array $data
 * @param string $msg
 * @param bool $status
 * @param int $code
 * @return array
 * User: 林松    Date: 2019/12/10
 */
function getJsonData($data = [], $msg = '操作成功！', $status = true, $code = 200)
{
    return [
        'msg' => $msg,
        'status' => $status,
        'code' => $code,
        'data' => $data,
        'time' => time()
    ];
}
