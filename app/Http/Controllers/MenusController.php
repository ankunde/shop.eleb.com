<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenusController extends Controller
{
    //用户列表
//    public function index()//搜索分页时需要用到
//    {
//
//        $rows = ShopCategories::all();
//        return view('shop_categories.index',compact('rows'));
//    }
    //添加商家
    public function create()
    {
        return view('menus.create');
    }
    //接受注册信息
    public function store(Request $request)
    {
//        //>>1.验证数据
        $this->validate($request,[
            'goods_name'=>'required|max:10|unique:menuses',
            'rating'=>'required',
            'shop_id'=>'required',
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
            'shop_id.required'=>'所属商家ID必须填写',
            'category_id.required'=>'所属分类ID必须填写',
            'goods_price.required'=>'价格必须填写',
            'description.required'=>'描述必须填写',
            'month_sales.required'=>'月销量必须填写',
            'rating_count.required'=>'评分数量必须填写',
            'tips.required'=>'提示信息必须填写',
            'satisfy_count.required'=>'满意度数量必须填写',
            'satisfy_rate.required'=>'满意度评分必须填写',
        ]);




        //>>1.1处理上传图片
        $path = $request->file('goods_img')->store('/public/'.date('Y-m-d'));
        //>>2.存入数据
        Menus::create([
            'name'=>$request->name,
            'img'=>$path,
            'status'=>$request->status
        ]);
        //>>3.返回首页
        return redirect()->route('shopcategories.index')->with("success","分类添加成功");
    }
//    //查看详细信息
//    public function show(Request $request,ShopCategories $shopcategory)
//    {
//        return view('shop_categories.show',compact('shopcategory'));
//    }
//    //回显修改列表
//    public function edit(Request $request,ShopCategories $shopcategory)
//    {
//        return view('shop_categories.edit',compact('shopcategory'));
//    }
//    //保存修改信息
//    public function update(Request $request,ShopCategories $shopcategory)
//    {
//        $this->validate($request,[
//            'name'=>'required|max:10',
//            'img'=>'required',
//            'status'=>'required'
//        ],[
//            'name.required'=>'商户名称必须填写',
//            'name.max'=>'商户名长度不能大于10',
//            'status'=>'状态必须选择'
//        ]);
//        //>>2.处理上传图片
//        $path=$request->img;
//        $data=[
//            'name'=>$request->name,
//            'status'=>$request->status
//        ];
//        if($path){
//            $path = $request->file('img')->store('/public/'.date('Y-m-d'));
//            $data['img']=$path;
//        }
//        //>>2.修改数据
//        $shopcategory->update($data);
//        //>>3.返回首页
//        return redirect()->route('shopcategories.index')->with("success","修改分类成功");
//    }
//
//    public function destroy(Request $request,ShopCategories $shopcategory)
//    {
//
//    }
}
