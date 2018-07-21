@extends('default')
@section('contents')
    <form action="{{route('menucategories.update',[$menucategory])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        @include('_error')
        <div class="form-group">
            <label for="shop_name">名称</label>
            <input type="text" class="form-control" name="name" id="shop_name" value="{{$menucategory->name}}">
        </div>
        <div class="form-group">
            店铺公告
            <textarea class="form-control" rows="3" name="description">{{$menucategory->description}}</textarea>
        </div>
        <div class="form-group">
            所属商家:
            <select class="form-control">
                <option value="">{{$menucategory->shop_id}}</option>
            </select>
        </div>
        <div class="form-group">
            是否默认分类
            <label class="radio-inline">
                <input type="radio"  name="is_selected"  id="inlineRadio9" value="0"<?=$menucategory->is_selected?'':'checked'?>
                > 否
            </label>
            <label class="radio-inline">
                <input type="radio" name="is_selected" id="inlineRadio10" value="1"<?=$menucategory->is_selected?'checked':''?>
                > 是
            </label>
        </div>
        <button type="submit" class="btn btn-default">修改</button>
    </form>
@endsection

