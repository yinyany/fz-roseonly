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
        <a href="{{ url('/admin/goods') }}">商品列表</a>
        <a>
          <cite>修改页面</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    @include('flash::message')

    <div class="x-body">
      <form class="layui-form" action='{{ url("admin/goods/update/$goods->id") }}' method="post">
          {{csrf_field()}}
           <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>商品类别
              </label>      
              <div class="layui-input-inline">
                  <select name="type_id" lay-filter="test">
                    <option value="0">请选择</option>
                    @foreach($list as $v)
                    <option @if($info->id === $v->id) selected @endif value='{{$v->id}}' >{{$v->name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="layui-input-inline">
                  <select name="type_id" lay-filter="test2" id="kkk">
                    @foreach($data as $v)
                    <option @if($ccc->id === $v->id) selected @endif value='{{$v->id}}' >{{$v->name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="layui-input-inline">
                  <select name="type_id" id="mmm">
                    @foreach($three as $v)
                    <option @if($bbb->id === $v->id) selected @endif value='{{$v->id}}' >{{$v->name}}</option>
                    @endforeach
                  </select>
              </div> 
          </div>
           <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>商品
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="name" class="layui-input" value="{{$goods->name}}">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red"></span>@if($errors->has('name')) {{$errors->first('name')}} @endif
              </div>
          </div>
          <div class="layui-form-item">

              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>图片
              </label>
              <button type="button" class="layui-btn" id="test1">
                <i class="layui-icon">&#xe67c;</i>上传图片
              </button>
              <input type="hidden" name="imgurl" value="{{$goods->imgurl}}" id="file">
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>显示
              </label>
              <img src="/uploads/good/{{ $goods->imgurl }}" style="height: 100px;" id="url" style="width: 200px;">
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>内容
              </label>
              <div class="layui-form-mid layui-word-aux">
                <script id="container" style="width:800px" name="content" type="text/plain">{{$goods->content}}</script>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>价格
              </label>
              <div class="layui-input-inline">
                <input onKeyPress="if((event.keyCode<48 || event.keyCode>57) && event.keyCode!=46 || /\.\d\d$/.test(value))event.returnValue=false" type="text" name="price" class="layui-input" value="{{$goods->price}}">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red"></span>@if($errors->has('price')) {{$errors->first('price')}} @endif
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label">
                <span class="x-red">*</span>状态
              </label>
              <div class="layui-input-inline">
                <select name="state" lay-verify="">
                  <option value="">请选择状态</option>
                  <option value="热卖"
                    @if($goods->state === "热卖")
                      selected
                    @endif
                   >热卖</option>
                  <option value="售馨" 
                    @if($goods->state === "售馨")
                      selected
                    @endif
                  >售馨</option>
                  <option value="下架" 
                    @if($goods->state === "下架")
                      selected
                    @endif
                  >下架</option>
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
        layui.use(['upload','form'], function(){
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
          ,url: '{{ url("/admin/goods/upload") }}' //上传接口
          ,field:'imgurl'
          ,done: function(res){
            $('#file').val(res.data.src);
            $('#url').attr("src",'/uploads/good/'+res.data.src);
          }
          ,error: function(){
            //请求异常回调
          }
        });
        var form = layui.form;
          form.on('select(test)', function(data){
            $.ajax({
              type:"GET",
              url:'{{ url("/admin/goods/good") }}?id='+data.value,
              success:function(msg){
                var selDom = $("#kkk");
                selDom.find("option").remove();
                selDom.append("<option value='0'>请选择</option>");
                for(var i = 0; i<msg.data.length; i++){
                  
                  selDom.append("<option value='"+msg.data[i].id+"'>"+msg.data[i].name+"</option>");
                }
                
              },
              error:function(data){

              }
            })
          });
      });
    </script>
    <script type="text/javascript" src="{{ asset('static/admin/ue/ueditor.config.js') }}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{ asset('static/admin/ue/ueditor.all.js') }}"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
@endsection 
