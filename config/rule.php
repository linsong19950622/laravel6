<?php
/**
 * User: 林松
 * Date: 2019/10/30
 * Time: 16:59
 */

/**
 * 全局配置规则
 * 用于请求参数规则验证
 */
return [
    'username' => [
        'required', 'string', 'between:2,32'
    ],
    'password' => [
        'required', 'min:6', 'regex:/^[a-zA-Z0-9]+$/'
    ],
    'mobile_phone' => [
        'required', 'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/'
    ]
];
