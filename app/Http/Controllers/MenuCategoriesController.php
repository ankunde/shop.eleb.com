<?php

namespace App\Http\Controllers;

use App\Model\MenuCategories;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MenuCategoriesController extends Controller
{
    //用户列表
    public function index()//搜索分页时需要用到
    {

        $rows = MenuCategories::all();
        return view('menucategories.index',compact('rows'));
    }
    //添加商家
    public function create()
    {
        return view('menucategories.create');
    }
    //接受注册信息
    public function store(Request $request)
    {

//        //>>1.验证数据
        $this->validate($request,[
            'name'=>'required|max:10|unique:menu_categories',
            'shop_id'=>'required',
            'description'=>'required',
            'is_selected'=>'required'
        ],[
            'name.required'=>'名称必须填写',
            'name.max'=>'名称长度不能大于10',
            'name.unique'=>'该分类已经存在',
            'shop_id.required'=>'所属商家ID',
            'description.required'=>'描述必须选择',
            'is_selected.required'=>'默认分类必须选择'
        ]);
        $type_accumulation = uniqid();//随机字符串
        //>>2.存入数据
        MenuCategories::create([
            'name'=>$request->name,
            'shop_id'=>$request->shop_id,
            'description'=>$request->description,
            'is_selected'=>1,
            'type_accumulation'=>$type_accumulation
        ]);
        //>>3.返回首页
        return redirect()->route('menucategories.index')->with("success","分类添加成功");
    }
//    //查看详细信息
//    public function show(Request $request,ShopCategories $shopcategory)
//    {
//        return view('shop_categories.show',compact('shopcategory'));
//    }
    //回显修改列表
    public function edit(Request $request,MenuCategories $menucategory)
    {
        return view('menucategories.edit',compact('menucategory'));
    }
    //保存修改信息
    public function update(Request $request,MenuCategories $menucategory)
    {
        $this->validate($request,[
            'name'=>['required',
            'max:10',
                Rule::unique('menu_categories')->ignore($menucategory->id)],
            'description'=>'required',
            'is_selected'=>'required'
        ],[
            'name.required'=>'名称必须填写',
            'name.max'=>'名称长度不能大于10',
            'description.required'=>'描述必须选择',
            'is_selected.required'=>'默认分类必须选择'
        ]);
        //>>2.修改数据
        $menucategory->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'is_selected'=>$request->is_selected
        ]);
        //>>3.返回首页
        return redirect()->route('menucategories.index')->with("success","修改分类成功");
    }

    public function destroy(Request $request,MenuCategories $menucategory)
    {
        $menucategory->delete();
        return redirect()->route('menucategories.index')->with('success','删除分类成功');
    }
}
