@extends('default')
@section('contents')
    <form action="{{route('menus.update',$menu)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        @include('_error')

        <div class="form-group">
            <label for="shop_im">商品图片</label>
            <input type="file"  id="shop_im" name="goods_img">
            <img src="{{ \Illuminate\Support\Facades\Storage::url($menu->goods_img)}}" alt="">
        </div>
        <div class="form-group">
            <label for="shop_name">名称</label>
            <input type="text" class="form-control" name="goods_name" id="shop_name" value="{{$menu->goods_name}}">
        </div>
        <div class="form-group">
            <label for="email">评分</label>
            <input type="number" class="form-control" name="rating" id="email" value="{{$menu->rating}}">
        </div>
        {{--所属商家ID:--}}
        {{--<select class="form-control" name="shop_id">--}}
            {{--<option value="1">美食</option>--}}
            {{--<option value="2">快餐</option>--}}
            {{--<option value="3">下午茶</option>--}}
            {{--<option value="4">大牌5折</option>--}}
            {{--<option value="5">小吃</option>--}}
        {{--</select>--}}
        {{--所属分类ID:--}}
        {{--<select class="form-control" name="category_id">--}}
            {{--<option value="1">美食</option>--}}
            {{--<option value="2">快餐</option>--}}
            {{--<option value="3">下午茶</option>--}}
            {{--<option value="4">大牌5折</option>--}}
            {{--<option value="5">小吃</option>--}}
        {{--</select>--}}
        <div class="form-group">
            <label for="password1">价格</label>
            <input type="number" class="form-control" name="goods_price" id="password1" value="{{$menu->goods_price}}">
        </div>

        <div class="form-group">
            <label for="password">描述</label>
            <input type="text" class="form-control" name="description" id="password" value="{{$menu->description}}">
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="shop_name2">月销量</label>--}}
            {{--<input type="number" class="form-control" name="month_sales" id="shop_name2" value="{{old('month_sales')}}">--}}
        {{--</div>--}}
        <div class="form-group">
            <label for="shop_im">评分数量</label>
            <input type="number" class="form-control" id="shop_im" name="rating_count" value="{{$menu->rating_count}}">
        </div>
        <div class="form-group">
            <label for="shop_im">提示信息</label>
            <input type="text" class="form-control" id="shop_im" name="tips" value="{{$menu->tips}}">
        </div>
        <div class="form-group">
            <label for="shop_im">满意度数量</label>
            <input type="number" class="form-control" id="shop_im" name="satisfy_count" value="{{$menu->satisfy_count}}">
        </div>
        <div class="form-group">
            <label for="shop_im">满意度评分</label>
            <input type="number" class="form-control" id="shop_im" name="satisfy_rate" value="{{$menu->satisfy_rate}}">
        </div>

        <button type="submit" class="btn btn-default">确认修改</button>
    </form>
@endsection

