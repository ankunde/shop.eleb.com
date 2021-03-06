@extends('default')
@section('css_file')
    <!--引入CSS-->
    <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">
@stop
@section('js_file')
    <!--引入JS-->
    <script type="text/javascript" src="/webuploader/webuploader.js"></script>
@endsection
@section('contents')
    <form action="{{route('menus.store')}}" method="post">
        {{csrf_field()}}
        @include('_error')

        <div class="form-group">
            <label for="shop_name">名称</label>
            <input type="text" class="form-control" name="goods_name" id="shop_name" value="{{old('goods_name')}}">
        </div>
        <div class="form-group">
            <label for="shop_im">商品图片</label>
            <input type="hidden"  id="shop_img" name="goods_img"><!--dom结构部分-->
            <div id="uploader-demo">
                <!--用来存放item-->
                <div id="fileList" class="uploader-list"></div>
                <div id="filePicker">选择图片</div>
                <img id="img">
            </div>

        </div>
        <div class="form-group">
            <label for="email">评分</label>
            <input type="number" class="form-control" name="rating" id="email" value="{{old('rating')}}">
        </div>
        {{--所属商家ID:--}}
        {{--<select class="form-control" name="shop_id">--}}
            {{--<option value="{$users->shop_id}}">{{$users->menucategories->shop_name}}</option>--}}
        {{--</select>--}}
        所属分类ID:
        <select class="form-control" name="category_id">
            @foreach($mc as $val)
            <option value="{{$val->id}}">{{$val->name}}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="password1">价格</label>
            <input type="number" class="form-control" name="goods_price" id="password1" value="{{old('goods_price')}}">
        </div>

        <div class="form-group">
            <label for="password">描述</label>
            <input type="text" class="form-control" name="description" id="password" value="{{old('description')}}">
        </div>
        <div class="form-group">
            <label for="shop_name2">月销量</label>
            <input type="number" class="form-control" name="month_sales" id="shop_name2" value="{{old('month_sales')}}">
        </div>
        <div class="form-group">
            <label for="shop_im">评分数量</label>
            <input type="number" class="form-control" id="shop_im" name="rating_count" value="{{old('rating_count')}}">
        </div>
        <div class="form-group">
            <label for="shop_im">提示信息</label>
            <input type="text" class="form-control" id="shop_im" name="tips" value="{{old('tips')}}">
        </div>
        <div class="form-group">
            <label for="shop_im">满意度数量</label>
            <input type="number" class="form-control" id="shop_im" name="satisfy_count" value="{{old('satisfy_count')}}">
        </div>
        <div class="form-group">
            <label for="shop_im">满意度评分</label>
            <input type="number" class="form-control" id="shop_im" name="satisfy_rate" value="{{old('satisfy_rate')}}">
        </div>

        <button type="submit" class="btn btn-default">注册</button>
    </form>
@endsection
@section('js')
    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
//            swf: BASE_URL + '/js/Uploader.swf',

            // 文件接收服务端。
            server: "{{route('upload')}}",

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },
            formData:{
                _token:"{{csrf_token()}}"
            }
        });
        //完成上传后触发事件
        uploader.on( 'uploadSuccess', function( file,response  ) {
            $('#img').attr('src',response.puthimg)//回显图片
            $('#shop_img').val(response.puthimg)
        });

    </script>
@endsection
