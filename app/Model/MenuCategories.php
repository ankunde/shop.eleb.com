<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MenuCategories extends Model
{
    protected $fillable=['name','type_accumulation','shop_id','description','is_selected'];
    public function shops()
    {
        return $this->hasOne(Shops::class,'id','shop_id');
    }
}
