@extends('layouts.admin.masterAdmin')
@section('title', '注册')

@section('link')
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection 

@section('class','class="login-bg"')
@section('content')
    <div class="login">
        <div class="message">roseonly 后台- 注册</div>

        <div id="darkbannerwrap"></div>
        <a href="{{ url('auth/login') }}">点此登录</a>
        
        <form method="post" action="{{ url('auth/register') }}" class="layui-form" >
            {{csrf_field()}}
            <input name="name" placeholder="用户名"  type="text" class="layui-input" value="{{ old('name') }}">
            <hr class="hr15">
            <input name="email" placeholder="邮箱"  type="email" class="layui-input" value="{{ old('email') }}">
            <hr class="hr15">
            <input name="password" placeholder="密码"  type="password" class="layui-input" value="{{ old('password') }}">
            <hr class="hr15">
            <input name="password_confirmation" placeholder="再次输入密码"  type="password" class="layui-input" value="{{ old('password') }}">
            <hr class="hr15">
            <input value="注册" style="width:100%;" type="submit">
            <hr class="hr20" >
            
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