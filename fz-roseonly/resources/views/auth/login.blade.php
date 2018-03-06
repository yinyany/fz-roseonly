@extends('layouts.admin.masterAdmin')
@section('title', '登录')
@section('link')
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
@endsection

@section('class','class="gray-bg"')
@section('content')
     <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div style="position:relative;left:-200px">
                <h1 class="logo-name">roseonly</h1>
            </div>
            <h3>欢迎登陆 roseonly</h3>
            <form class="m-t" role="form" action="{{ url('auth/login') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="用户名" required="" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="密码" required="" value="{{ old('password') }}">
                </div>
                <div class="form-group">
                    <input class="no-padding" type="checkbox" name="remember"> 记住密码?
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
                <p class="text-muted text-center"> <a href="{{ url('password/email') }}"><small>忘记密码了？邮箱找回</small></a> | <a href="{{ url('auth/register') }}">注册一个新账号</a>
                </p>
            </form>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
@endsection


   
