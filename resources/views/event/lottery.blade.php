@extends('default')
@section('contents')
    <h1>开奖结果</h1>
    <table class="table table-striped" width="80%">
        <tr>
            <th>获得商品</th>
            <th>参加者</th>
        </tr>
        @foreach($eventprizes as $value)
        <tr>
            <td>{{$value->name}}</td>
            <td>{{$value->user->name??'该商品没有获得者'}}</td>
        </tr>
        @endforeach
    </table>
@endsection

