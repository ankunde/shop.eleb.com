<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable=['name','email','password','status','shop_id'];
    //>>一对多
    public function shops()
    {
        return $this->hasOne(Shops::class,'id','shop_id');
    }
}
