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
        菜品分类选择:
        <select class="form-control" name="shop_id">
            <option value="1">美食</option>
            <option value="2">快餐</option>
            <option value="3">下午茶</option>
            <option value="4">大牌5折</option>
            <option value="5">小吃</option>
        </select>
        </div>
        <div class="form-group">
            描述
            <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
        </div>
        <div class="form-group">
            是否默认分类:
            <label class="radio-inline">
                <input type="radio" name="is_selected" id="inlineRadio1" value="0"> 不是
            </label>
            <label class="radio-inline">
                <input type="radio" name="is_selected" id="inlineRadio2" value="1" checked> 是
            </label>
        </div>
        <button type="submit" class="btn btn-default">注册</button>
    </form>
@endsection



