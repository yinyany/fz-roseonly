@extends('layouts.admin.masterAdmin')
@section('title', '注册')
@section('link')
    <link href="{{ asset('./static/admin/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
@endsection

@section('class','class="gray-bg"')
@section('content')
      <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div style="position:relative;left:-200px">
                <h1 class="logo-name">roseonly</h1>
            </div>
            <h3>欢迎注册 roseonly管理员</h3>
            <form class="m-t" role="form" action="{{ url('auth/register') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="请输入用户名" required="" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="请输入邮箱" required="" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="请输入密码" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="请再次输入密码" required="">
                </div>
                <div class="form-group text-left">
                    <div class="checkbox i-checks">
                        <label class="no-padding">
                            <input type="checkbox"><i></i> 我同意注册协议</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">注 册</button>
                <p class="text-muted text-center"><small>已经有账户了？</small><a href="{{ url('auth/login') }}">点此登录</a>
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

@section('js')
    <script src="{{ asset('./static/admin/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection 