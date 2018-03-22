@extends('layouts.admin.masterAdmin')
@section('title', '用户管理')

@section('link')
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/bute') }}">属性名列表</a
        <a>
          <cite>添加属性名</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    @include('flash::message')

    <div class="x-body">
      <form class="layui-form" action="{{ url('/admin/bute/store') }}" method="post">
          {{csrf_field()}}
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>商品类别
              </label>      
              <div class="layui-input-inline">
                  <select name="type_id" lay-filter="test">
                    <option value="0">请选择</option>
                    @foreach($list as $v)
                    <option value='{{$v->id}}' >{{$v->name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="layui-input-inline">
                  <select name="type_id" lay-filter="test2" id="kkk">
                    <option value="0">请选择</option>
                  </select>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>属性名
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="name" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red"></span><span style="color: red;">@if($errors->has('name')) {{$errors->first('name')}} @endif</span>
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label">
                <span class="x-red">*</span>状态
              </label>
              <div class="layui-input-inline">
                <select name="state" lay-verify="">
                  <option value="单选" selected>单选</option>
                  <option value="多选">多选</option>
                </select> 
              </div>  
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  添加
              </button>
          </div>
      </form>

    </div>
@endsection

@section('js')
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
      layui.use(['upload','form'], function(){
          var $ = layui.$
          var upload = layui.upload;
           $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var form = layui.form;
          form.on('select(test)', function(data){
            $.ajax({
              type:"GET",
              url:'{{ url("/admin/bute/good") }}?id='+data.value,
              success:function(msg){
                var selDom = $("#kkk");
                selDom.find("option").remove();
                selDom.append("<option value='0'>请选择</option>");
                for(var i = 0; i<msg.data.length; i++){ 
                  selDom.append("<option value='"+msg.data[i].id+"'>"+msg.data[i].name+"</option>");
                }
                form.render('select');
              },
              error:function(data){

              }
            })
          });
      });
      
    </script>
@endsection 
