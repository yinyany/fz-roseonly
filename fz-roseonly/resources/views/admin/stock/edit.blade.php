@extends('layouts.admin.masterAdmin')
@section('title', '用户管理')

@section('link')
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/stock') }}">库存管理</a>
        <a>修改库存</a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    @include('flash::message')

    <div class="x-body">
      <form class="layui-form" action='{{ url("admin/stock/update/$stock->id") }}' method="post">
          {{csrf_field()}}
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>商品名
              </label>
              <div class="layui-input-inline">
                <select name="good_id" lay-verify="">
                    <option value="0">请选择</option>
                    @foreach($goods as $v)
                    <option @if($data->id === $v->id) selected @endif value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>属性名
              </label>
              <div class="layui-input-inline">
                <select name="bid" lay-filter="test">
                    <option value='0' >请选择</option>
                    @foreach($bute as $v)
                    <option @if($datas->id === $v->id) selected @endif value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>属性值
              </label>
              <div class="layui-input-inline">
                <select name="vid" lay-filter="" id="kkk">
                    <option value='0' >请选择</option>
                    @foreach($value as $v)
                    <option @if($values->id === $v->id) selected @endif value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>价格
              </label>
              <div class="layui-input-inline">
                <input onKeyPress="if((event.keyCode<48 || event.keyCode>57) && event.keyCode!=46 || /\.\d\d$/.test(value))event.returnValue=false" type="text" name="price" class="layui-input" value="{{$stock->price}}">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red"></span>@if($errors->has('price')) {{$errors->first('price')}} @endif
              </div>
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>库存
              </label>
              <div class="layui-input-inline">
                  <input onKeyPress="if((event.keyCode<48 || event.keyCode>57) && event.keyCode!=46 || /\.\d\d$/.test(value))event.returnValue=false" type="text" name="stock" class="layui-input" value="{{$stock->stock}}">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red"></span>@if($errors->has('stock')) {{$errors->first('stock')}} @endif
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
          var form = layui.form;
          form.on('select(test)', function(data){
            $.ajax({
              type:"GET",
              url:'{{ url("/admin/stock/good") }}?id='+data.value,
              success:function(msg){
                var selDom = $("#kkk");
                selDom.find("option").remove();
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
