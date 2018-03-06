@extends('layouts.admin.masterAdmin')
@section('title', '重置密码')
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
            <h3>重置 roseonly密码</h3>
            <form class="m-t" role="form" action="{{ url('/password/reset') }}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="请输入邮箱" required="" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="请输入密码" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="请再次输入密码" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">重置密码</button>
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