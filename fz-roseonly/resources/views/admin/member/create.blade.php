@extends('layouts.admin.masterAdmin')
@section('title', '用户管理')

@section('link')
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/member') }}">会员管理</a>
        <a>
          <cite>添加会员</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <form class="layui-form" action="{{ url('admin/member/store') }}" method="post">
          {{csrf_field()}}
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>登录名
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="name" class="layui-input" value="{{old('name')}}">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>@if($errors->has('name')) {{$errors->first('name')}} @endif
              </div>
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>手机
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="phone" class="layui-input" value="{{old('phone')}}">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>@if($errors->has('phone')) {{$errors->first('phone')}} @endif
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  <span class="x-red">*</span>邮箱
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="email" class="layui-input" value="{{old('email')}}">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>@if($errors->has('email')) {{$errors->first('email')}} @endif
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red">*</span>性别</label>
              <div class="layui-input-block">
                <input type="radio" name="sex" value="男" title="男">
                <input type="radio" name="sex" value="女" title="女" checked>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_pass" class="layui-form-label">
                  <span class="x-red">*</span>密码
              </label>
              <div class="layui-input-inline">
                  <input type="password" name="password" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  @if($errors->has('password')) {{$errors->first('password')}} @endif
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
                  <span class="x-red">*</span>确认密码
              </label>
              <div class="layui-input-inline">
                  <input type="password" name="password_confirmation" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  @if($errors->has('password')) {{$errors->first('password')}} @endif
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  增加
              </button>
          </div>
      </form>

    </div>
@endsection

@section('js')
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
    </script>
@endsection 
