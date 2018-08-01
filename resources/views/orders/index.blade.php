@extends('default')
@section('contents')
<div class="row">
    <div class="col-xs-7">
        <form action="{{route('orders.count')}}" method="get">
            <div class="row">
                <div class="col-xs-2">
                    <input type="text" name="day" class="form-control" placeholder="日期">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="month" class="form-control" placeholder="月份">
                </div>
                <div class="col-xs-2">
                    <button class="btn btn-default" type="submit">订单统计</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-xs-5">
            <form action="{{route('orders.count')}}" method="get">
                {{csrf_field()}}
                <input type="hidden" name="year" value="0">
                <button class="btn btn-default" type="submit">累计</button>
            </form>
    </div>
    <div class="col-xs-12">
        <form action="{{route('order.lists')}}" method="get">
            <div class="col-xs-2">
                <input type="text" name="day1" class="form-control" placeholder="日期">
            </div>
            <div class="col-xs-2">
                <input type="text" name="month1" class="form-control" placeholder="月份">
            </div>
            <div class="col-xs-2">
                <input type="text" name="year1" class="form-control" placeholder="年">
            </div>
            <div class="col-xs-2">
                <button type="submit" class="btn btn-default">菜品统计查询</button>
            </div>
        </form>
    </div>
        <table class="table table-striped">
        <tr>
            <th>编号</th>
            <th>用户id</th>
            <th>订单编号</th>
            <th>价格</th>
            <th>状态</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        @foreach($rows as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->user_id}}</td>
                <td>{{$row->sn}}</td>
                <td>{{$row->total}}</td>
                <td>{{$row->status}}</td>
                <td>{{$row->created_at}}</td>
                <td>
                    <a href="{{route('orders.show',[$row])}}"><span class="glyphicon glyphicon-search">查看</span></a>
                    <a href="{{route('orders.index',['i'=>$row->id,'work'=>1])}}">发货</a>
                    <a href="{{route('orders.index',['i'=>$row->id,'work'=>-1])}}">取消</a>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection




