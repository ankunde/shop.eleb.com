<?php

namespace App\Http\Controllers;

use App\Model\Shops;
use App\Model\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SessionController extends Controller
{
    //显示登录页
    public function create()
    {
        return view('session.create');
    }
    //创建会话
    public function store(Request $request)
    {
        //>>1.验证数据
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required',
            'captcha'=>'required|captcha'
        ],[
            'name.required'=>'用户名必须填写',
            'password.reqired'=>'密码必须填写',
            'captcha.required'=>'验证码必须填写',
            'captcha.captcha'=>'验证码填写不正确'
        ]);
        //>>2.审核数据
        $row = Users::where('name',$request->name)->first();//用户数据
        if (!$row){
            return redirect()->back()->with('danger','用户名不存在');
        }
        $rows = Shops::where('id',$row->shop_id)->first();//用户商铺数据
        if(!$row->status && $rows->status){
            return redirect()->back()->with('danger','对不起的,你的账户目前处于禁用,不能登录');
        }
//        dd($row->status);
        if (Auth::attempt(['name'=>$request->name,'password'=>$request->password],$request->status)){
            return redirect()->route('users.index')->with('success','登录成功');
        }else{
            return redirect()->back()->with('danger','用户名或者密码错误');
        }
    }
    //关闭会话
    public function destroy(){
        Auth::logout();
        return redirect()->route('login')->with('success','您已退出登录');
    }
    //修改密码页
    public function edit(Request $request,Users $login){
        return view('users.change',compact('login'));
    }
    //保存修改密码
    public function save(Request $request,Users $user){
//        dd($user->name);
        //>>1.初步验证数据
        $this->validate($request,[
            'password'=>'required',
            'newpassword'=>'required|confirmed',
        ],[
            'password.required'=>'原密码必须填写',
            'newpassword.required'=>'新密码必须填写',
            'newpassword.confirmed'=>'两次输入密码不一致'
        ]);
        //>>2.数据库验证

        if(!Hash::check($request->password, $user->password)){
            return redirect()->back()->with('danger','对不起,你的原密码不正确');
        }
        //>>3.修改数据
        $user->update([
            'password'=>bcrypt($request->newpassword)
        ]);
        //>>4.修改成功消除session
        Auth::logout();
        //>>5.跳转页面并提示
        return redirect()->route('login')->with('success','密码修改成功,请重新登录');
    }
}
