<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>找回密码</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/login_edit.css') }}">
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
    		<form action="{{ url('/authindex/password') }}" method="post">
                {{ csrf_field() }}
                <div class="register_phote" >
                    <input type="text" placeholder="邮箱" name="email" maxlength="30" class="register_text text_p">
                   <!-- 手机号错误提示信息 -->
                    <div class="reminder_validate" >
                        @if($errors->has('email'))
                            <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                            {{$errors->first('email')}}
                        @endif 
                    </div>
                </div>
            
                <div class="signin_login">
                     <input type="submit" value="发送邮件找回密码">
                </div> 
            </form>
            <div class="register_bonter">
                roseonly支持门店城市同城速递服务!
            </div> 
    	</div>
    @include('flash::message')
    </div>
</body>
</html>