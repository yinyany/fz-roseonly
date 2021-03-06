@extends('layouts.admin.masterAdmin')
@section('title', '登录')

@section('link')
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection 


@section('class','class="login-bg"')
@section('content')
    <div class="login">
        <div class="message">roseonly 后台- 登录</div>

        <div id="darkbannerwrap"></div>
        <form method="post" action="{{ url('auth/login') }}" class="layui-form" >
            {{csrf_field()}}
            <input name="name" placeholder="用户名"  type="text" class="layui-input" value="{{ old('name') }}">
            <hr class="hr15">
            <input name="password" placeholder="密码"  type="password" class="layui-input" value="{{ old('password') }}">
            <hr class="hr15">
            <div class="layui-input-inline" style="width:50%;">
              <input type="text" name="captcha" required lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input">
            </div>
           <img src="{{URL::to('captcha/create')}}" id="captcha-img" onclick="reloadCaptcha();" class="pull-right" style="width:48%;height:50px;">
           <!-- <img src="{{captcha_src()}}" id="captcha-img" onclick="reloadCaptcha();" class="pull-right" style="width:48%;height:50px;"> -->
<!--             {!! captcha_img() !!} -->
            <hr class="hr15">
            <input name="remember" type="checkbox">记住密码
            <hr class="hr15">
            <input value="登录" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
        <div style="float:right">
                <span>忘记密码？点击：</span>
                <a href="{{ url('password/email') }}">邮箱找回密码</a>
            </div>
        <span>没有账号？点击：</span>
        <a href="{{ url('auth/register') }}">注册</a>
        
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
@include('flash::message')
@endsection
@section('js')
    <script>
      
        function reloadCaptcha(){
          $("#captcha-img").attr("src","{{URL::to('captcha/create')}}?rand="+Math.random());
          return false;
        }
    </script>

@endsection 

   
