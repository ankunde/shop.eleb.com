<?php

namespace App\Http\Controllers;

use App\Model\MenuCategories;
use App\Model\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MenusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['index']
        ]);
    }
    //用户列表
    public function index()//搜索分页时需要用到
    {
        $rows = Menus::all();
        return view('menus.index',compact('rows'));
    }
    //添加商家
    public function create()
    {
        //当前用户的所有分类id
        $user = Auth::user()->shop_id;//所属商家
        $mc = MenuCategories::all()->where('shop_id',$user);
//        dd($mc);
        return view('menus.create',compact('users','mc'));
    }
    //接受注册信息
    public function store(Request $request)
    {
//        //>>1.验证数据
        $this->validate($request,[
            'goods_name'=>'required|max:10|unique:menuses',
            'rating'=>'required',
            'category_id'=>'required',
            'goods_price'=>'required',
            'description'=>'required',
            'month_sales'=>'required',
            'rating_count'=>'required',
            'tips'=>'required',
            'satisfy_count'=>'required',
            'satisfy_rate'=>'required'
        ],[
            'goods_name.required'=>'名称必须填写',
            'goods_name.max'=>'名称最大不能超过10个',
            'goods_name.unique'=>'名称已被注册',
            'rating.required'=>'评分必须填写',
            'category_id.required'=>'所属分类ID必须填写',
            'goods_price.required'=>'价格必须填写',
            'description.required'=>'描述必须填写',
            'month_sales.required'=>'月销量必须填写',
            'rating_count.required'=>'评分数量必须填写',
            'tips.required'=>'提示信息必须填写',
            'satisfy_count.required'=>'满意度数量必须填写',
            'satisfy_rate.required'=>'满意度评分必须填写',
        ]);


        $user = Auth::user()->shop_id;

        //>>1.1处理上传图片
        $path = $request->file('goods_img')->store('/public/'.date('Y-m-d'));
        //>>2.存入数据
        Menus::create([
            'goods_name'=>$request->goods_name,
            'rating'=>$request->rating,
            'shop_id'=>$user,
            'category_id'=>$request->category_id,
            'goods_price'=>$request->goods_price,
            'description'=>$request->description,
            'month_sales'=>$request->month_sales,
            'rating_count'=>$request->rating_count,
            'tips'=>$request->tips,
            'satisfy_count'=>$request->satisfy_count,
            'satisfy_rate'=>$request->satisfy_rate,
            'goods_img'=>$path
        ]);
        //>>3.返回首页
        return redirect()->route('menus.index')->with("success","分类添加成功");
    }
//    //查看详细信息
//    public function show(Request $request,ShopCategories $shopcategory)
//    {
//        return view('shop_categories.show',compact('shopcategory'));
//    }
    //回显修改列表
    public function edit(Request $request,Menus $menu)
    {
        return view('menus.edit',compact('menu'));
    }
    //保存修改信息
    public function update(Request $request,Menus $menu)
    {
        $this->validate($request,[
            'goods_name'=>['required','max:10',Rule::unique('menuses')->ignore($menu->id)],
            'goods_price'=>'required',
            'description'=>'required',
            'rating_count'=>'required',
            'tips'=>'required',
            'satisfy_count'=>'required',
            'satisfy_rate'=>'required'
        ],[
            'goods_name.required'=>'名称必须填写',
            'goods_name.max'=>'名称长度不能大于10',
            'goods_name.unique'=>'该商品名已被注册',
            'goods_price.required'=>'价格必须填写',
            'description.required'=>'描述必须填写',
            'rating_count.required'=>'价格必须填写',
            'tips.required'=>'评分数量必须填写',
            'satisfy_count.required'=>'满意度数量必须填写',
            'satisfy_rate.required'=>'满意度评分必须填写'
        ]);
        //>>2.处理上传图片
        $path=$request->goods_img;
        $data=[
            'goods_name'=>$request->goods_name,
            'goods_proce'=>$request->goods_proce,
            'description'=>$request->description,
            'rating'=>$request->rating,
            'tips'=>$request->tips,
            'satisfy_count'=>$request->satisfy_count,
            'satisfy_rate'=>$request->satisfy_rate
        ];
        if($path){
            $path = $request->file('img')->store('/public/'.date('Y-m-d'));
            $data['goods_img']=$path;
        }
        //>>2.修改数据
        $menu->update($data);
        //>>3.返回首页
        return redirect()->route('menus.index')->with("success","修改商品成功");
    }
//
    public function destroy(Request $request,Menus $menu)
    {

        $menu->delete();
        return redirect()->route('menus.index')->with('success','删除商品成功');
    }
}
