@extends('layouts.admin.masterAdmin')
@section('title', '用户管理')

@section('link')
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/static/template.js"></script>
    <style type="text/css">
      .layui-form-item .layui-input-inline{
        width: 160px;
      }
      .layui-btn{
        height: 30px;
        line-height: 30px;
      }
      .layui-btn
    </style>
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/goods') }}">商品列表</a>
        <a>
          <cite>添加商品</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    @include('flash::message')

    <div class="x-body">
      <form class="layui-form" action="{{ url('/admin/goods/store') }}" method="post">
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
                  <select name="type_id" id="kkk">
                    <option value="0">请选择</option>
                  </select>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>属性名：
              </label>
              <div class="layui-input-inline" lay-filter="test4" id="nnn">
                <input type="checkbox" name="" title="请选择属性名" disabled>
              </div>
          </div>
          <div id="rai1"></div>

          <script  id='rai' type="text/html">
            <div  class="layui-form-item" id="radio<%=data.bute.id%>">
                <label for="username" class="layui-form-label" id="value">
                    <span class="x-red">*</span><%=data.bute.name%></label>
                <div class="layui-input-inline" lay-filter="test4" id="values">
                  <%for (var i = 0; i < data.data.length; i++) {%>
                  <input type='radio' name='vid[<%=data.data[i].bute_id%>]' value='<%=data.data[i].id%>' title='<%=data.data[i].name%>' lay-filter='test4'>
                  <%}%>
                </div>
                
            </div>
          </script>
          <div id="chec1"></div>
          <script  id='chec' type="text/html">
            <div  class="layui-form-item" id="checkbo<%=data.bute.id%>">
                <label for="username" class="layui-form-label" id="value">
                    <span class="x-red">*</span><%=data.bute.name%></label>
                <div class="layui-input-inline" lay-filter="test4" id="values">
                  <%for (var i = 0; i < data.data.length; i++) {%>
                    <input type='checkbox' name='vid[<%=data.data[i].bute_id%>][]' value='<%=data.data[i].id%>' title='<%=data.data[i].name%>' lay-filter='test5'>

                  <%}%>
                </div>
            </div>
          </script>

          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>商品
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="name" class="layui-input" value="{{old('name')}}">
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
              <input type="hidden" name="imgurl" value="" id="file">
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>显示
              </label>
              <img src="" id="url" style="width: 200px;">
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>内容
              </label>
              <div class="layui-form-mid layui-word-aux">
                <script id="container" style="width:800px" name="content" type="text/plain">
                </script>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>价格
              </label>
              <div class="layui-input-inline">
                <input onKeyPress="if((event.keyCode<48 || event.keyCode>57) && event.keyCode!=46 || /\.\d\d$/.test(value))event.returnValue=false" type="text" name="price" class="layui-input" value="{{old('price')}}">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red"></span>@if($errors->has('price')) {{$errors->first('price')}} @endif
              </div>
          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>库存
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="stock" class="layui-input" value="{{old('stock')}}">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red"></span>@if($errors->has('stock')) {{$errors->first('stock')}} @endif
              </div>
          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>状态
              </label>
              
              <div class="layui-input-inline">
                  <select name="state" lay-verify="">
                    <option>热卖</option>
                    <option>售馨</option>
                    <option>下架</option>
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
                form.render('select');
              },
              error:function(data){

              }
            })
          });
          form.on('select(test)', function(data){
            $.ajax({
              type:"GET",
              url:'{{ url("/admin/goods/attr") }}?id='+data.value,
              success:function(msg){
                var selDom = $("#kkk");
                selDom.find("option").remove();
                selDom.append("<option value='0'>请选择</option>");
                for(var i = 0; i<msg.data.value.length; i++){
                  selDom.append("<option value='"+msg.data.value[i].id+"'>"+msg.data.value[i].name+"</option>");
                }
                form.render('select');
                var selDom3 = $("#nnn");
                if(msg.data==''){
                  selDom3.children().remove();
                  selDom3.append("<input type='checkbox' name='' title='请选择属性值'' disabled>");
                  form.render('checkbox');
                }else{
                  selDom3.children().remove();
                  for(var i = 0; i<msg.data.attr.length; i++){
                    selDom3.append("<input type='checkbox' name='bid[]' value='"+msg.data.attr[i].id+"' title='"+msg.data.attr[i].name+"' lay-filter='test4'>");
                  }
                  form.render('checkbox');
                }
              },
              error:function(data){

              }
            })
          });
          form.on('checkbox(test4)', function(data){
            if(data.elem.checked===true){
              $.ajax({
                type:"GET",
                url:'{{ url("/admin/goods/value") }}?id='+data.value,
                success:function(msg){
                  if(msg.data.bute.state==='单选'){
                    var html = template(document.getElementById('rai').innerHTML,{data:msg.data,name:'vid[]'});
                    document.getElementById('rai1').innerHTML += html;
                    form.render('radio');
                  }else{
                    var html = template(document.getElementById('chec').innerHTML,{data:msg.data,name:'vid[]'});
                    document.getElementById('chec1').innerHTML += html;
                    form.render('checkbox');
                  }
                     
                },
                error:function(data){

                }
              })
            }else{
              var radio = document.getElementById('radio'+data.value);
              var check = document.getElementById('checkbo'+data.value);
              if (radio!=null) {
                document.getElementById('rai1').removeChild(radio);
              }
              if (check!=null) {
                document.getElementById('chec1').removeChild(check);
              }
            }
            
          });
          // form.on('checkbox(test5)', function(data){
          //   var value = data.value;
          //  if(data.elem.checked===true){
              
          //     var values = data.value;
          //     $(this).before("<div class='layui-form-mid layui-word-aux' id='div'><input type='text' name='stock[]' required  lay-verify='required' placeholder='库存' class='layui-input' id='input' style='height: 30px;line-height: 30px;'></div>");  
          //     var uploadInst = upload.render({
          //       elem: '#'+value //绑定元素
          //       ,url: '{{ url("/admin/goods/upload") }}' //上传接口
          //       ,field:'imgurl'
          //       ,done: function(res){
          //         console.log(res.data.src);
          //         $('#'+values).val(res.data.src);
          //       }
          //       ,error: function(){
          //         //请求异常回调
          //       }
          //     }); 
          //  }else{
          //   $('#div').remove();
          //   $('#input').remove();
          //  }
           
          // });
          
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
