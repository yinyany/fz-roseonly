<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/login.css') }}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('static/admin/lib/layui/layui.js') }}" charset="utf-8"></script>
</head>
<body>
	<!-- ++++++++++ logo +++++++++++ -->
    <div id="logo">
        <a href="index.html">
            <img src="{{ asset('static/index/images/comment/logo.jpg') }}" alt="roseonly官网" title="roseonly官网">
        </a>
    </div>
    <!-- 导航 -->
   
    <!-- ++++++++++ banner +++++++++++ -->
    <div class="banner">
    	<!-- 左半边 -->
    	<div class="register_bj">
    		<form action="{{ url('/authindex/login') }}" method="post">
                {{ csrf_field() }}
                <div class="register_phote">
                    <input type="text" placeholder="请输入用户名" name="name" id="username" maxlength="30" class="register_text text_p" value="{{ old('name') }}">
                   <!-- 错误提示信息 -->
                    <div class="reminder_validate" >
                        @if($errors->has('name'))
                            <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                            {{$errors->first('name')}}
                        @endif 
                    </div> 
                    <div class="register_pas">                          
                        <input type="password" name="password" placeholder="请输入密码"  class="register_password" value="{{ old('password') }}">
                    </div>
                     <!-- 错误提示信息 -->
                    <div class="reminder_validate" >
                        @if($errors->has('password'))
                            <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                            {{$errors->first('password')}}
                        @endif 
                    </div> 
                    <div class="register_yzmpas" >
                        <div class="layui-input-inline" style="width:50%;">
                        <input type="text" name="captcha" required lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input" value="{{ old('captcha') }}">
                        </div>
                        <img src="{{URL::to('captcha/create')}}" id="captcha-img" onclick="reloadCaptcha();" class="pull-right" style="width:46%;height:50px;">
                    </div>
                    <!-- 错误提示信息 -->
                    <div class="reminder_validate" >
                        @if($errors->has('captcha'))
                            <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                            {{$errors->first('captcha')}}
                        @endif 
                    </div> 
                </div>
                <div class="signin_a">
                    <a href="{{ url('/authindex/register') }}" class="signin_zc" style="font-size: 14px;">快速注册</a>
                    <a href="{{ url('/authindex/password') }}" class="signin_forget" style="font-size: 14px;">忘记密码？</a>
                </div>
                <div class="signin_login">
                     <input type="submit" value="登录账号">
                </div> 
                
                
            </form>
            <div class="register_bonter">
                roseonly支持门店城市同城速递服务!
            </div> 
    	</div>
    @include('flash::message')
    </div>
        <script>
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            
            function reloadCaptcha(){
              $("#captcha-img").attr("src","{{URL::to('captcha/create')}}?rand="+Math.random());
              return false;
            }
        </script>
</body>
</html>