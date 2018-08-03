@extends('default')
@section('contents')
    <table class="table table-striped">
        <tr>
            <th>编号</th>
            <th>活动名称</th>
            <th>报名开始时间</th>
            <th>报名结束时间</th>
            <th>开奖日期</th>
            <th>报名人数限制</th>
            <th>是否已开奖</th>
            <th>操作</th>
        </tr>
        @foreach($event as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->title}}</td>
            <td>{{$value->signup_start}}</td>
            <td>{{$value->signup_end}}</td>
            <td>{{$value->prize_date}}</td>
            <td>{{$value->signup_num}}</td>
            <td>{{$value->is_prize?'是':'否'}}</td>
            <td>
                <a href="{{route('event.show',[$value])}}" class="btn btn-primary"><span class="
glyphicon glyphicon-search">查看</span></a>
                @if($value->is_prize)
                <a href="{{route('event.lottery',$value)}}" class="btn btn-primary"><span class="
glyphicon glyphicon-search">查看开奖结果</span></a>
                @endif

            </td>
        </tr>
        @endforeach
    </table>
{{--    {{$rows->links()}}--}}
@endsection
