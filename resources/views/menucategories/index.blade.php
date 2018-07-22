@extends('default')
@section('contents')
    <form action="{{route('menucategories.create')}}" method="get">
        <button type="submit" class="btn btn-primary">添加菜品分类</button>
    </form>
    <table class="table table-striped">
        <tr>
            <th>编号</th>
            <th>名称</th>
            <th>所属商家</th>
            <th>描述</th>
            <th>是否是默认分类</th>
            <th>查看</th>
        </tr>
        @foreach($rows as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->shops->shop_name}}</td>
                <td>{{$row->description}}</td>
                <td>{{$row->is_selected}}</td>
                <td>

                    <a href="{{route('menucategories.edit',[$row])}}"><span class="glyphicon glyphicon-pencil"></span></a>
                    <form action="{{route('menucategories.destroy',[$row->id])}}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection




