


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="{{\Illuminate\Support\Facades\Storage::url('/1.jpg')}}" width="35px">
            </a>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">全球外卖</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">全球外卖</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">精彩活动 <span class="sr-only">(current)</span></a></li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">搜美食</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('users.create')}}">注册</a></li>
                @auth
                <li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户:{{\Illuminate\Support\Facades\Auth::user()->name }} <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="{{route('menus.index')}}">小店菜品</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('edit',[\Illuminate\Support\Facades\Auth::user()])}}">修改密码</a></li>
                        {{--{{route('admins.change',[\Illuminate\Support\Facades\Auth::user()])}}--}}
                    </ul>
                </li>
                <li>
                    <form action="{{route('logout')}}" method="get">
                        {{csrf_field()}}
                        <button class="btn btn-link" style="padding-top: 14px">注销</button>
                    </form>
                </li>
                @endauth
                @guest
                <li><a href="{{route('login')}}">登录</a></li>

                @endguest
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="#">修改密码</a></li>--}}
                        {{--<li><a href="#">Another action</a></li>--}}
                        {{--<li><a href="#">Something else here</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="#">Separated link</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

