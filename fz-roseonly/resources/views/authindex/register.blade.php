<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/register.css') }}">
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
    		<form action="{{ url('/authindex/register') }}" method="post" >
                {{ csrf_field() }}
                <div class="register_phote" style="margin-top:20px;">
                    <input type="text" placeholder="用户名" name="name"  maxlength="30" class="register_text " value="{{ old('name') }}">
                   
               </div>  
                <!-- 错误提示信息 -->
                <div class="reminder_validate" >
                    @if($errors->has('name'))
                        <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                        {{$errors->first('name')}}
                    @endif 
                </div> 
                <div class="register_phote">
                    <input type="text" placeholder="邮箱" name="email"  maxlength="30" class="register_text " value="{{ old('email') }}">
                   
                </div>  
                <!-- 错误提示信息 -->
                <div class="reminder_validate" >
                    @if($errors->has('email'))
                        <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                        {{$errors->first('email')}}
                    @endif 
                </div> 
                
                <!-- 验证码 -->
                <div class="register_yzmpas" style="width:290px;height:51px; margin:0px auto;" >
                    <div class="layui-input-inline" >
                    <input type="text" name="captcha" required lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input" style="width:150px;height:45px;float:left;text-indent:10px;" value="{{ old('captcha') }}">
                    </div>
                    <img src="{{URL::to('captcha/create')}}" id="captcha-img" onclick="reloadCaptcha();" class="pull-right" style="width:130px;height:51px;">
                </div>
                <!-- 错误提示信息 -->
                <div class="reminder_validate">
                    @if($errors->has('captcha'))
                        <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                        {{$errors->first('captcha')}}
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

                <div style="margin:0px auto;width:290px;height:20px;font-size: 12px;">
                    <a href="{{ url('/authindex/login') }}" style="color:#414141;">已有账号,点击登陆</a>
                </div>
                
                <div class="signin_regist">
                    <input type="submit" value="创建账号">
                    <!-- <a href="javascript:;"></a> -->
                </div>
            </form>
    		
            <!-- 底部 -->
            <div class="register_bonter">
                <a href="">roseonly支持门店城市同城速递服务!</a>
            </div>
    	</div>

    </div>
    <script>
        // $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        // });
        
        function reloadCaptcha(){
          $("#captcha-img").attr("src","{{URL::to('captcha/create')}}?rand="+Math.random());
          return false;
        }
    </script>
</body>
</html>