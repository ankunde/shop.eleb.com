@extends('default')
@section('contents')
    <form action="{{route('menucategories.store')}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}
        @include('_error')

        <div class="form-group">
            <label for="shop_name">名称</label>
            <input type="text" class="form-control"  name="name" id="shop_name" value="{{old('name')}}">
        </div>
        <div class="form-group">
        所属商家选择:
        <select class="form-control" name="shop_id">
            <option value="{{\Illuminate\Support\Facades\Auth::user()->shop_id}}">{{\Illuminate\Support\Facades\Auth::user()->name}}</option>
        </select>
        </div>
        <div class="form-group">
            描述
            <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
        </div>
        <div class="form-group">
            是否默认分类:
            <label class="radio-inline">
                <input type="radio" name="is_selected" id="inlineRadio1" value="0" checked> 不是
            </label>
        </div>
        <button type="submit" class="btn btn-default">注册</button>
    </form>
@endsection



