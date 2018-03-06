@extends('layouts.admin.masterAdmin')
@section('title', '重置密码')
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
            <h3>重置 roseonly 密码</h3>
            <form class="m-t" role="form" action="{{ url('password/email') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="邮箱" required="" value="{{ old('email') }}">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">发送重置密码邮件</button>
                <p class="text-muted text-center"><small>重新登陆？</small><a href="{{ url('auth/login') }}">点此登录</a>
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


   
