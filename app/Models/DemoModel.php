<?php

namespace App\Models;

use App\Events\DemoDeletedEvent;
use Illuminate\Database\Eloquent\Builder;

class DemoModel extends BaseModel
{
    protected $table = ''; //表名
    protected $primaryKey = ''; //主键
    protected $fillable = []; //白名单
    protected $guarded = []; //黑名单
    protected $hidden = []; //隐藏
    public $timestamps = false; //自动维护时间戳
    protected $dateFormat = 'U'; //时间戳格式

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
     * 订阅者 触发
     * @var array
     */
    protected $dispatchesEvents = [
        'deleted' => DemoDeletedEvent::class
    ];

    /**
     * 访问器
     * 使用：$demoModel->display_name
     * @return mixed
     * User: 林松    Date: 2019/11/13 14:18
     */
    public function getDisplayNameAttribute()
    {
        return $this->nickname ? $this->nickname : $this->name;
    }

    /**
     * 修改器
     * @param $value
     * User: 林松    Date: 2019/11/13 14:21
     */
    public function setCardNoAttribute($value)
    {
        $value = str_replace(' ', '', $value);
        $this->attributes['card_no'] = $value;
    }

    /**
     * 访问器
     * 使用：$demoModel->card_num
     * @return string
     * User: 林松    Date: 2019/11/13 14:24
     */
    public function getCardNumAttribute()
    {
        if (!$this->card_no) {
            return '';
        }
        $cardNo = mb_substr($this->card_no, -4);
        return '**** *** **** ' . $cardNo;
    }

    /**
     * 局部作用域
     * 使用： $demoModel->ofPopular(1);
     * @param Builder $query
     * @param int $status
     * @return Builder
     * User: 林松    Date: 2019/11/13 15:35
     */
    public function scopeOfPopular(Builder $query, $status = self::STATUS_YES)
    {
        return $query->where('status', $status);
    }
}
