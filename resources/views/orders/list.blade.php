@extends('default')
@section('contents')
    <table class="table table-striped" width="80%">
        <tr>
            <th>菜名</th>
            <th>销量</th>
        </tr>
        @foreach($rows as $row)
        <tr>
            <td>{{$row->goods_name}}</td>
            <td>{{$row->a}}</td>
        </tr>
        @endforeach
    </table>
@endsection

