@extends('layouts.admin.masterAdmin')
@section('title', '用户管理')

@section('link')
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/bute') }}">属性名列表</a>
        <a>
          <cite>修改页面</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    @include('flash::message')

    <div class="x-body">
      <form class="layui-form" action='{{ url("admin/bute/update/$bute->id") }}' method="post">
          {{csrf_field()}}
          <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>商品类别
            </label>      
            <div class="layui-input-inline">
                <select name="type_id" lay-filter="test" >
                  <option value="0">请选择</option>
                  @foreach($list as $v)
                  <option @if($info->id === $v->id) selected @endif
                   value='{{$v->id}}' > {{$v->name}}</option>
                  @endforeach
                </select>
                <br> 
                <select name="type_id" lay-verify="" id="kkk" lay-ignore>
                  @foreach($value as $v)
                  <option @if($info->id === $v->id) selected @endif value='{{$v->id}}'>{{$v->name}}</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>属性名
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="name" class="layui-input" value="{{$bute->name}}">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red"></span><span style="color: red;">@if($errors->has('name')) {{$errors->first('name')}} @endif</span>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  修改
              </button>
          </div>
      </form>

    </div>
@endsection

@section('js')
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
        });
    </script>
@endsection 
