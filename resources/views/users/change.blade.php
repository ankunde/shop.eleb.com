@extends('default')
@section("contents")
    @include('_error')
    <form action="{{route('save',[\Illuminate\Support\Facades\Auth::user()])}}" method="post">
        {{--{{route('admins.reset',[\Illuminate\Support\Facades\Auth::user()])}}--}}
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">原密码</label>
            <input type="password" name="password" class="form-control" id="exampleInputEmail1" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">新密码</label>
            <input type="password" name="newpassword" class="form-control" id="exampleInputPassword1" >
        </div>
        <div class="form-group">
            <label for="exampleInputFile">确认密码</label>
            <input type="password" class="form-control" name="newpassword_confirmation" id="exampleInputFile">
        </div>
        <button type="submit" class="btn btn-default">确认修改</button>
    </form>
@endsection

