<?php

namespace App\Http\Controllers;

use App\Model\Activity;
use Illuminate\Http\Request;
//活动表
class ActivityController extends Controller
{
    public function index(Request $request)//搜索分页时需要用到
    {
        $result = Activity::all();//获取所有数据
        $keyword = $request->keyword;
        $rows = [];
        foreach ($result as $value){//获取所有单条数据
            $start_time =  $value->start_time;
            $start_time = strtotime($start_time);
            $end_time = $value->end_time;
            $end_time = strtotime($end_time);
            if($keyword==1){//活动未开始
                if ($start_time - time()>0){
                    $rows[] = $value;
                }
            }
            elseif($keyword==2){//活动进行中
                if($start_time - time() < 0 && $end_time -time() >0 ){
                    $rows[] = $value;
                }
            }
            else{
                $rows[] = $value;
            }
        }
        return view('activity.index',compact('rows'));
    }
    public function show(Request $request,Activity $activity)
    {
        return view('activity.show',compact('activity'));

    }
}
