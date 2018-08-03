<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventPrizes extends Model
{
    protected $fillable=['events_id','member_id'];
    /**
     * 活动商品表关联用户表 关系一对一
     */
    public function user()
    {
        return $this->hasOne(Users::class,'id','member_id');
    }
}
