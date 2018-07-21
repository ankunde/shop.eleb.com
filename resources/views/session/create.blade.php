@extends('default')
@section('contents')
    @include('_error')
    <form method="post" action="{{route('login')}}">
        <div class="form-group">
            {{csrf_field()}}
            <label for="exampleInputEmail1">用户名</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            验证码:
            <input id="captcha" class="form-control" name="captcha" >
            <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="status" value="1"> 记住我
            </label>
        </div>
        <button type="submit" class="btn btn-default">登录</button>
    </form>
@endsection