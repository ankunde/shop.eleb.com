@extends('default')
@section('contents')
    <ul class="nav nav-pills">
        <li role="presentation" class="active"><a href="{{route('activity.index',['keyword'=>0])}}">所有活动</a></li>
        <li role="presentation"><a href="{{route('activity.index',['keyword'=>1])}}">未开始</a></li>
        <li role="presentation"><a href="{{route('activity.index',['keyword'=>2])}}">正在进行中</a></li>

    </ul>
    <table class="table table-striped">
        <tr>
            <th>编号</th>
            <th>活动名称</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>操作</th>
        </tr>
        @foreach($rows as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->title}}</td>
            <td>{{$row->start_time}}</td>
            <td>{{$row->end_time}}</td>
            <td>
                <a href="{{route('activity.show',[$row])}}"><span class="
glyphicon glyphicon-search"></span></a>|
            </td>
        </tr>
        @endforeach
    </table>
{{--    {{$rows->links()}}--}}
@endsection
