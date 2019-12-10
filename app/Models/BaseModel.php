<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    protected $dateFormat = 'U';

//    protected $fillable = ['*'];
    protected $guarded = [];

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

    /**
     * 重写-去s
     * 根据model class获取表名 表名中包含_，用驼峰自动转换
     * @return string
     * User: 林松    Date: 2019/12/10
     */
    public function getTable()
    {
        return $this->table ? $this->table : Str::snake(class_basename($this));
    }

}
