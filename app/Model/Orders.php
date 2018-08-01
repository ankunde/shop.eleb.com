<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
//    protected $table='orders';
    protected $fillable=['user_id','shop_id','sn','province','city','count','address','tel','name','total','status','created_at','out_trade_no'];
}
