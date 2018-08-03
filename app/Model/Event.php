<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','content','signup_start','signup_end','prize_date','signup_num','is_prize'];
    /**
     * 活动表关联活动商品表  一对多
     */
    public function event_prizes()
    {
        return $this->hasOne(EventPrizes::class,'events_id','id');
    }
}
