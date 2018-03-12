@extends('layouts.admin.masterAdmin')
@section('title', '重置密码')

@section('link')
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection 

@section('class','class="login-bg"')
@section('content')
    <div class="login">
        <div class="message">roseonly 后台- 重置密码</div>

        <div id="darkbannerwrap"></div>
        
        
        <form method="post" action="{{ url('password/email') }}" class="layui-form" >
            {{csrf_field()}}
            <input name="email" placeholder="邮箱"  type="email" class="layui-input" value="{{ old('email') }}">
            <hr class="hr15">
            <input value="发送重置密码邮件" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
        <span>返回登录页？点击：</span>
        <a href="{{ url('auth/login') }}">登录</a>

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

@endsection
@section('js')
    <script>
        $(function  () {
            layui.use('form', function(){
              var form = layui.form;
              });
        })

    </script>

@endsection 
   
