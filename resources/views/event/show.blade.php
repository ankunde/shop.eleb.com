@extends('default')
@section('contents')
    <table class="table table-striped" width="80%">

        <tr>
            <td>编号</td>
            <td>{{$event->id}}</td>
        </tr>
        <tr>
            <td>活动名称</td>
            <td>{{$event->title}}</td>
        </tr>
        <tr>
            <td>活动内容</td>
            <td>{!!$event->content!!}</td>
        </tr>
        <tr>
            <td>报名开始时间</td>
            <td>
                {{$event->signup_start}}
            </td>
        </tr>
        <tr>
            <td>报名结束时间</td>
            <td>{{$event->signup_end}}</td>
        </tr>
        <tr>
            <td>开奖时间</td>
            <td>{{$event->prize_date}}</td>
        </tr>
    </table>
    <form action="{{route('event.status',[$event])}}" method="post">
        {{csrf_field()}}
        <button type="submit" class="btn btn-warning">报名此活动</button>
    </form>
@endsection


