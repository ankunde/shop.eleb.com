@extends('default')
@section('contents')
    <form action="{{route('menus.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        @include('_error')

        <div class="form-group">
            <label for="shop_name">名称</label>
            <input type="text" class="form-control" name="goods_name" id="shop_name" value="{{old('goods_name')}}">
        </div>
        <div class="form-group">
            <label for="email">评分</label>
            <input type="number" class="form-control" name="rating" id="email" value="{{old('rating')}}">
        </div>
        {{--所属商家ID:--}}
        {{--<select class="form-control" name="shop_id">--}}
            {{--<option value="{$users->shop_id}}">{{$users->menucategories->shop_name}}</option>--}}
        {{--</select>--}}
        所属分类ID:
        <select class="form-control" name="category_id">
            @foreach($mc as $val)
            <option value="{{$val->id}}">{{$val->name}}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="password1">价格</label>
            <input type="number" class="form-control" name="goods_price" id="password1" value="{{old('goods_price')}}">
        </div>

        <div class="form-group">
            <label for="password">描述</label>
            <input type="text" class="form-control" name="description" id="password" value="{{old('description')}}">
        </div>
        <div class="form-group">
            <label for="shop_name2">月销量</label>
            <input type="number" class="form-control" name="month_sales" id="shop_name2" value="{{old('month_sales')}}">
        </div>
        <div class="form-group">
            <label for="shop_im">评分数量</label>
            <input type="number" class="form-control" id="shop_im" name="rating_count" value="{{old('rating_count')}}">
        </div>
        <div class="form-group">
            <label for="shop_im">提示信息</label>
            <input type="text" class="form-control" id="shop_im" name="tips" value="{{old('tips')}}">
        </div>
        <div class="form-group">
            <label for="shop_im">满意度数量</label>
            <input type="number" class="form-control" id="shop_im" name="satisfy_count" value="{{old('satisfy_count')}}">
        </div>
        <div class="form-group">
            <label for="shop_im">满意度评分</label>
            <input type="number" class="form-control" id="shop_im" name="satisfy_rate" value="{{old('satisfy_rate')}}">
        </div>
        <div class="form-group">
            <label for="shop_im">商品图片</label>
            <input type="file"  id="shop_im" name="goods_img">
        </div>
        <button type="submit" class="btn btn-default">注册</button>
    </form>
@endsection

