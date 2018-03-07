@extends('layouts.admin.masterAdmin')
@section('title', '503 页面')
@section('class','class="gray-bg"')
@section('content')
    <div class="middle-box text-center animated fadeInDown">
        <h1>503</h1>
        <h3 class="font-bold">网站维护中...</h3>
        <div class="error-desc">
            抱歉，请稍后刷新~
            <form class="form-inline m-t" role="form">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="请输入您需要查找的内容 …">
                </div>
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
        </div>
    </div>
@endsection
