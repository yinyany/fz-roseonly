<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>resonly 后台- @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('./static/admin/favicon.ico')}}"> 
    <link href="{{ asset('./static/admin/css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{ asset('./static/admin/css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{ asset('./static/admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('./static/admin/css/style.css?v=4.1.0')}}" rel="stylesheet">
    @section('link')
        {{-- 此区块继承加载其他外部引入文件 --}}    
    @show
</head>

<body @yield('class')>
    @section('content')
        {{-- 此区块继承加载页面主体 --}}    
    @show

    <!-- 全局js -->
    <script src="{{ asset('./static/admin/js/jquery.min.js?v=2.1.4')}}"></script>
    <script src="{{ asset('./static/admin/js/bootstrap.min.js?v=3.3.6')}}"></script>
    @section('js')
        {{-- 此区块继承加载js文件 --}}    
    @show
   
</body>

</html>
