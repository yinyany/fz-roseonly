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
        <a href="{{ url('/admin/carousel') }}">图片列表</a>
        <a>
          <cite>修改页面</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    @include('flash::message')

    <div class="x-body">
      <form class="layui-form" action='{{ url("admin/carousel/update/$model->id") }}' method="post">
          {{csrf_field()}}
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>图片
              </label>
              <button type="button" class="layui-btn" id="test1">
                <i class="layui-icon">&#xe67c;</i>上传图片
              </button>
              <input type="hidden" name="imgurl" value="{{$model->imgurl}}" id="file">
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>显示
              </label>
              <img src="/uploads/banner/{{ $model->imgurl }}" style="height: 100px;" id="url" style="width: 200px;">
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label">
                <span class="x-red">*</span>状态
              </label>
              <div class="layui-input-inline">
                <select name="state" lay-verify="">
                  <option value="">请选择状态</option>
                  <option value="启用"
                    @if($model->state === "启用")
                      selected
                    @endif
                   >启用</option>
                  <option value="禁用" 
                    @if($model->state === "禁用")
                      selected
                    @endif
                  >禁用</option>
                </select> 
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
        layui.use('upload', function(){
        var $ = layui.$
        var upload = layui.upload;

         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        //执行实例
        var uploadInst = upload.render({
          elem: '#test1' //绑定元素
          ,url: '{{ url("/admin/carousel/upload") }}' //上传接口
          ,field:'imgurl'
          ,done: function(res){
            $('#file').val(res.data.src);
            $('#url').attr("src",'/uploads/banner/'+res.data.src);
          }
          ,error: function(){
            //请求异常回调
          }
        });
      });
    </script>
@endsection 
