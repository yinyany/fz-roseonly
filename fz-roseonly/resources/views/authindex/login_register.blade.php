<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/login_register.css') }}">
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
    		<form action="" >
            <!--     <div class="register_phote" style="margin-top:20px;">
                    <input type="text" placeholder="用户名" name="username"  maxlength="30" class="register_text ">
                   
               </div>   -->
                 <!-- 手机号错误提示信息 -->
                <!-- <div class="reminder_validate" >
                    <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                   请填写正确的用户名
                </div>  -->
                <div class="register_phote"style="margin-top:30px;">
                    <input type="text" placeholder="邮箱" name="username"  maxlength="30" class="register_text ">
                   
               </div>  
                 <!-- 手机号错误提示信息 -->
                <div class="reminder_validate" >
                    <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                   请填写正确的邮箱地址
                </div>    
                
                <!-- 验证码 -->
               <!--  <div class="register_yzmpas" >
                    <input type="text" name="rand" placeholder="图片验证码" maxlength="4" class="register_yzm" id="rand_yzm">
                    <div class="register_yzmimg">
                        <img  src="{{ asset('static/index/images/login/3.jpg') }}" width="100px" height="47px" alt="验证码" title="验证码" onclick="javascript:refreshRand();">
                        
                    </div>
        
                </div> -->
                <!-- 验证码提示信息 -->
                <!-- <div class="reminder_validate" >
                    <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                     请输入4位图片验证码                     
                </div>   -->

             
               <div class="register_phote">
                    <input input type="password" name="password" placeholder="重置密码"  maxlength="30" class="register_text " >
                   
               </div>
                <!-- 验证码提示信息 -->
                <div class="reminder_validate" >
                    <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                     请输入正确的密码                    
                </div>  

               <div class="register_phote">
                    <input input type="password" name="password" placeholder="确认重置密码"  maxlength="30" class="register_text " >
                   
               </div>
                <!-- 验证码提示信息 -->
                <div class="reminder_validate" >
                    <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                     请输入正确的密码                      
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

    </div>
</body>
</html>