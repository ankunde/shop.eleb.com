@extends('default')
@section('contents')
    {{--<ul class="nav nav-tabs">--}}
        {{--<li role="presentation" class="active"><a href="#">小吃</a></li>--}}
        {{--<li role="presentation" ><a href="#">快餐</a></li>--}}
        {{--<li role="presentation"><a href="#">美食</a></li>--}}
    {{--</ul>--}}
    <form action="{{route('menus.create')}}" method="get">
        <button type="submit" class="btn btn-primary">添加菜品</button>
    </form>
    <table class="table table-striped">
        <tr>
            <th>编号</th>
            <th>图片</th>
            <th>名称</th>
            <th>描述</th>
            <th>价格</th>
            <th>所属商家</th>
            <th>所属分类</th>
            <th>查看</th>
        </tr>
        @foreach($rows as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>
                    <img src="{{\Illuminate\Support\Facades\Storage::url($row->goods_img)}}" alt="">
                </td>
                <td>{{$row->goods_name}}</td>
                <td>{{$row->description}}</td>
                <td>{{$row->goods_price}}</td>
                <td>{{$row->shops->shop_name}}</td>
                <td>{{$row->menucategories->name}}</td>
                <td>
                    <a href="{{route('menus.edit',[$row])}}"><span class="glyphicon glyphicon-pencil"></span></a>
                    <form action="{{route('menus.destroy',[$row->id])}}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection




