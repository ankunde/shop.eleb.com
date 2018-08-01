<?php

namespace App\Http\Controllers;

use App\Model\Menus;
use App\Model\OrderGoods;
use App\Model\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//订单表
class OrdersController extends Controller
{
    /**
     * 订单列表
     */
    public function index(Request $request){
        $rows = Orders::where('shop_id',auth()->user()->id)->get();
        if($request->work||!$request->work){
            Orders::where('id',$request->i)
                ->update([
                    'status'=>$request->work
                ]);
        }
        return view('orders.index',compact('rows'));
    }
    /**
     * 查看订单
     * @param Request $request
     * @param Orders $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request,Orders $order){
        return view('orders.show',compact('order'));
    }
    /**
     * 统计数量
     */
    public function count(Request $request)
    {
        $date='';
        //用户id
        $shop_id = auth()->user()->shop_id;
        //>>1.根据日期去查
        if($request->day){
            $date = date('Y-m',time()).'-'.$request->day;
        }
        //>>2.根据月份去查
        if($request->month){
            $date = date('Y',time()).'-'.$request->day;
        }
        //>>3.累计
        if($request->year){
            $date = $request->day;
        }
        $rows= Orders::where([
            ['shop_id',$shop_id],
            ['created_at','like',"{$date}%"]
        ])
            ->count();
        return view('orders.count',compact('rows'));
    }
    /*
     * 商品的查询
     */
    public function lists(Request $request)
    {
        $date = '';
        $shop_id = auth()->user()->shop_id;
        //>>1.根据日期查
        if($request->day1){
            $date = date('Y-m',time()).'-'.$request->day1;
            var_dump($date);
        }
        //>>2.根据月份查
        if($request->month1){
            $date = date('Y',time()).'-'.$request->month1;
            var_dump($date);
        }
        //>>3.根据年查
        if($request->year1){
            $date =$request->year1;
        }
        $rows = DB::select("select m.goods_name,sum(o.amount) as a 
        from order_goods as o
        JOIN menuses as m ON m.id=o.goods_id
        where  o.updated_at like '{$date}%'  and m.shop_id='{$shop_id}' 
        group by o.goods_id
        order BY a DESC
");
        return view('orders.list',compact('rows'));
    }
}
