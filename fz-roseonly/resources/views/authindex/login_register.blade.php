<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>重置密码</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/login_register.css') }}">
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
    		<form action="{{ url('/authindex/reset') }}" method="post">
                {{ csrf_field() }}
            
                <div class="register_phote"style="margin-top:30px;">
                    <input type="text" placeholder="验证码" name="key"  maxlength="30" class="register_text " value="{{ old('key') }}">
                   
                </div>  
                <div class="reminder_validate" >
                    @if($errors->has('key'))
                        <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                        {{$errors->first('key')}}
                    @endif 
                </div> 
             
                <div class="register_phote">
                    <input input type="password" name="password" placeholder="输入密码"  maxlength="30" class="register_text " value="{{ old('password') }}">
                   
                </div>
                <!-- 错误提示信息 -->
                <div class="reminder_validate" >
                    @if($errors->has('password'))
                        <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                        {{$errors->first('password')}}
                    @endif 
                </div> 

               <div class="register_phote">
                    <input input type="password" name="password_confirmation" placeholder="确认密码"  maxlength="30" class="register_text " value="{{ old('password_confirmation') }}">
                   
               </div>
                <!-- 错误提示信息 -->
                <div class="reminder_validate" >
                    @if($errors->has('password_confirmation'))
                        <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                        {{$errors->first('password_confirmation')}}
                    @endif 
                </div> 

                
                <div class="signin_regist">
                    <input type="submit" value="找回密码">
                    
                </div>
            </form>
    		
            <!-- 底部 -->
            <div class="register_bonter">
                <a href="">roseonly支持门店城市同城速递服务!</a>
            </div>
    	</div>
    @include('flash::message')
    
    </div>
</body>
</html>