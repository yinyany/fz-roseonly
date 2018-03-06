<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>roseonly 后台- @yield('title')</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="{{ asset('static/admin/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('static/admin/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('static/admin/css/xadmin.css') }}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('static/admin/lib/layui/layui.js') }}" charset="utf-8"></script>
    <script type="text/javascript" src="{{ asset('static/admin/js/xadmin.js') }}"></script>
    @section('link')
        {{-- 此区块继承加载其他外部引入文件 --}}    
    @show
</head>

<body @yield('class')>
    @section('content')
        {{-- 此区块继承加载页面主体 --}}    
    @show

    @section('js')
        {{-- 此区块继承加载js文件 --}}    
    @show
   
</body>

</html>
