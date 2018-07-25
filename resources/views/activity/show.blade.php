@extends('default')
@section('contents')
    <table class="table table-striped" width="80%">

        <tr>
            <td>编号</td>
            <td>{{$activity->id}}</td>
        </tr>
        <tr>
            <td>活动名称</td>
            <td>{{$activity->title}}</td>
        </tr>
        <tr>
            <td>活动内容</td>
            <td>{!!$activity->content!!}</td>
        </tr>
        <tr>
            <td>开始时间</td>
            <td>
               {{$activity->start_time}}
            </td>
        </tr>
        <tr>
            <td>结束时间</td>
            <td>{{$activity->end_time}}</td>
        </tr>
    </table>
@endsection


