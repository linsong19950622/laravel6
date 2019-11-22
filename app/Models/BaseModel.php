<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $dateFormat = 'U';

    const STATUS_DELETE = -1;
    const STATUS_DOING = 0;
    const STATUS_YES = 1;
    const STATUS_NO = 2;

    const STATUS_NAME = [
        self::STATUS_DELETE => '已删除',
        self::STATUS_DOING => '待处理',
        self::STATUS_YES => '允许',
        self::STATUS_NO => '拒绝',
    ];

}
