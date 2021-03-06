@extends('layouts.index.masterIndex')
@section('title', '个人中心')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/person.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/person3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/css/city.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/message/message.css') }}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('static/admin/lib/layui/layui.js') }}" charset="utf-8"></script>
    <script src="{{ asset('static/index/js/message/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('static/index/js/person.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/js/jquery.min_1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/js/city.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/index.js') }}" type="text/javascript"></script>
    <link rel="icon" href="{{ asset('static/index/images/index_images/log_tb.jpg') }}">
@endsection 


@section('content')
    <!-- 主题内容区域 -->
    <article>
        <div id="content">
            <div id="line"></div>
            <div id="order">
             
                <!-- 导航 -->
                <nav>
                    <a href="javascript:;" class="nav_hover">我的订单</a>
       
                    <a href="javascript:;">我的信息</a>
                    <a href="javascript:;">收货地址</a>
                </nav>
                <div class="order_con">
                    <!-- 我的订单信息 -->
                   
                    <div class="sec1 sec">
                        @foreach($order as $list)
                        <!-- 订单标号内容 -->
                        <div class="con_r" >
                            <ul class="con_ra">
                                <li>
                                    <div>
                                        <span class="center-a">订单编号：</span>
                                        <span class="center-b">{{$list['order_number']}}</span> 
                                    </div>
                                   
                                </li>
                                <li>
                                    <div>
                                        <span class="center-a">支付方式：</span>
                                        <span class="center-b">在线支付</span>      
                                    </div>
                                   
                                </li>
                                <li>
                                    <div>
                                         <span class="center-a">订单状态：</span>
                                         @if($list['is_pay'] == 0)
                                         <span class="center-b"> 等待付款</span>
                                         @elseif( $list['is_pay'] == 1)
                                         <span class="center-b"> 已付款</span>
                                         @endif
                                    </div>
                                  
                                </li>
                                <li>
                                    <div>
                                         <span class="center-a">添加时间：</span>
                                         <span class="center-b" >{{ $list['created_at'] }}</span>
                                    </div>
                                  
                                </li>
                                <li>
                                    <div>
                                        <span class="center-a">订单金额：</span>
                                        <span class="center-b">
                                        ￥<label id="jep618650" class="jep">{{ $list['pay_prices'] }}</label>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="center-all">
                                        <span class="center-a">订单操作：</span>
                                        @if($list['is_pay'] == 1 && $list['is_receipt'] == 1)
                                            <button class="btn center-c queren" style="border:none;">交易完成</button> 
                                        @elseif($list['is_pay'] == 1)
                                             <button class="btn center-c queren" style="border:none;"><input type="hidden" value="{{$list['id']}}" class="orid">确认收货</button> 
                                        @elseif($list['is_pay'] == 0)
                                             <button class="btn center-c showModel" style="border:none;">等待付款<input type="hidden" value="{{$list['id']}}" class="orderid"></button>
                                             <a href='{{url("orderhome/destroy/$list[id]")}}'class="orderdel">取消订单</a>
                                        @endif
                                    </div>
                                </li>
                            </ul>

                        
                            <div style="clear:both;"></div>
                            <div>
                                <p style="color:#777;margin-bottom:10px;">
                                    <span style="margin-right:20px;">收货人：<strong style="color:#333;">{{ $list['memaddress']['shpeople']}}</strong></span>
                                    <span style="margin-right:20px;">收货地址：<strong style="color:#333;">{{ $list['memaddress']['shaddress']}}</strong></span>
                                </p>
                                <p style="margin-bottom:10px;color:#777;"  >
                                    <span style="margin-right:90px; ">收货人电话：<strong style="color:#333;">{{ $list['memaddress']['shphone']}}</strong></span>
                                    <span style="margin-right:10px; ">收货人邮编：<strong style="color:#333;">{{ $list['memaddress']['shpostcode']}}</strong></span>
                                </p>
                            </div>
                            @foreach($list['order_goods'] as $ordergoods ) 
                            <div class="con_bom"  >
                              <img src="/uploads/good/{{ $ordergoods['goods']['imgurl'] }}" alt=""> 
                                 <div class="cona_left">
                                     <ul>
                                         <li>
                                            <span class="center-q">商品名称:</span>
                                             <span class="center-w">{{$ordergoods['goods']['name']}}</span>
                                         </li>
                                          <li>
                                             <span class="center-q">单价:</span>
                                             <span class="center-w">
                                            ￥<label >{{$ordergoods['goods']['price']}}</label>
                                            </span>
                                         </li>
                                          <li>
                                             <span class="center-q">商品数量:</span>
                                             <span class="center-w">{{ $ordergoods['goods_num']}}</span>
                                         </li>
                                         <li>
                                              <span class="center-q">物流状态:</span>
                                             @if($list['is_pay']==1 && $list['is_ship'] == 1)
                                             <span class="center-w">已发货</span>
                                             @else
                                              <span class="center-w">未发货</span>
                                             @endif

                                         </li>
                                         <li>
                                             <span class="center-q">物流单号:</span>
                                             <span class="center-w">{{ $list['ship_number'] }}</span>
                                         </li>
                                        
                                     </ul>
                                 </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                        <!-- 结束订单标号内容 -->
                       <div id="modal" class="modal" >  
                            <div class="modal-content">  
                                <header class="modal-header">  
                                    <h4 style="margin-left:300px;border:none;">请输入支付密码</h4>  
                                    <span class="close">×</span>  
                                </header>  
                                <!-- form 表单信息 -->
                                <form action='{{ url("/orderhome/update") }}' method="post">
                                     {{ csrf_field() }}
                                    <input type="hidden" name="id" id="orderid" value="">
                                    <div class="modal-body">  
                                           <div class="paycontainer">
                                            <input type="password" minlength="6" maxlength="6" class="paypasswordcontainer"
                                                   oncontextmenu="return false" onpaste="return false" oncopy="return false"
                                                   oncut="return false" autocomplete="off" name="zhifu">
                                            <div class="sixpassword">
                                                <i class="active"><b></b></i>
                                                <i><b></b></i>
                                                <i><b></b></i>
                                                <i><b></b></i>
                                                <i><b></b></i>
                                                <i><b></b></i>
                                                <span class="guanbiao"></span>
                                                <div id="names"></div>
                                            </div>
                                        </div>
                                        
                                    </div>   
                                    <div class="modal-footer" style="margin-bottom: 20px;"> 
                                        <button class="cancel" type="reset">取消</button>  
                                        <button class="sure" type="submit">确定</button>  
                                    </div> 
                                </form>  
                            </div>  
                        </div>
                       
                   </div>
                    <!-- 基本信息 -->
                    <div class="sec4 sec hide">
                        <h3>
                            <a href="javascript:;" class="person_hover">基本信息</a>
                            <a href="javascript:;">修改密码</a>
                        </h3>
                        <div class="sec3" class="selected1">
                            <!-- <iframe name="formsubmit" style="display:none;">     -->
                            <!-- </iframe> target="formsubmit" -->
                            <form action='' method="post" id="form">
                                {{ csrf_field() }}
                                
                                <table id="person_info" cellpadding="0" cellspacing="0">
                                    <colgroup>
                                        <col width="120">
                                        <col width="182">
                                        <col width="160">
                                        <col width="240">
                                        <col width="232">
                                    </colgroup>
                                     <tr >
                                        <td></td>
                                        <td></td>
                                        <td >姓名</td>
                                        <td>
                                            <input type="text" name="name" maxlength=15 class="text" value="{{ $model->name }}" style="text-indent: 20px;" readonly="readonly" id="name">
                                        </td>
                                        <td colspan="2" rowspan="3">
                                            <!-- 上传的头像 -->
                                            @if($model->imgurl===null)
                                                <img src="">
                                            @else
                                                <img src="/uploads/picture/{{ $model->imgurl }}" width="100px" height="100px" style="float:left;" id="picture" >
                                            @endif
                                            <input type="hidden" name="imgurl" value="{{$model->imgurl}}" id="two">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 300px;">爱人名字</td>
                                        <td><input type="text" name="fere" value="{{ $model->fere }}" maxlength=15 class="text" style="text-indent: 20px;" id="fere"></td>
                                        <td>手机</td>
                                        <td><input type="text" name="phone" value="{{ $model->phone }}" maxlength=15 class="text" style="text-indent: 20px;"  onblur="test1_()" id="phone1">
                                        </td>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td>爱人手机</td>
                                        <td><input type="text" name="fere_phone" value="{{ $model->fere_phone }}" maxlength=15 class="text" style="text-indent: 10px;" onblur="test_()" id="productName"></td>
                                        
                                        <td>生日</td>
                                        <td>
                                            <input type="text" class="layui-input" id="test1" name="birthday" value="{{ $model->birthday }}" style="text-indent: 10px;width:170px;height:30px;">
                                            <!-- <input type="text" name="birthday" value="{{ $model->birthday }}" maxlength=15 class="text" > -->
                                        </td>
                                        <td colspan="2"></td>
                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>情感状态</td>
                                        <td>
                                            <select name="affective" id="marriage">
                                                <option value=""
                                                @if($model->affective == null)
                                                    selected
                                                @endif
                                                >关系</option>
                                                <option value="未婚" 
                                                @if($model->affective == "未婚")
                                                    selected
                                                @endif
                                                >未婚</option>
                                                <option value="订婚" 
                                                @if($model->affective == "订婚")
                                                    selected
                                                @endif
                                                >订婚</option>
                                                <option value="已婚" 
                                                @if($model->affective == "已婚")
                                                    selected
                                                @endif
                                                >已婚</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="javascript:;" id="test" class="file" style="float: left;" >选择图片
                                                <input type="hidden" name="id" value="{{$model->id}}" id="prc">
                                            </a>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td >性别</td>
                                        <td >
                                            <input type="radio" name="sex" value='男' class="sex" 
                                            @if($model->sex == "男")
                                                checked
                                            @endif
                                             > 男 &nbsp;&nbsp;
                                            <input type="radio" name="sex" value='女' class="sex" 
                                            @if($model->sex == "女")
                                                checked
                                            @endif
                                            > 女
                                        </td>
                                        <td colspan="2">
                                        </td>
                                        
                                    </tr>
                                    <tr id="select_city">
                                        <td></td>
                                        <td></td>
                                        <td>支付密码</td>

                                        <td colspan="2">
                                            <input type="password" name="zfpass" value="******" id="zfpass"  maxlength="200" style="display: block;width:170px;height: 30px;border:1px solid #83847e;color:#83847e;text-indent: 20px;overflow:hidden;">
                                        </td>
                                    </tr>
                                    <tr id="select_city">
                                        <td></td>
                                        <td></td>
                                        <td>居住地址</td>
                                        <td colspan="2">
                                            <input type="text" name="address" value="{{ $model->address }}" id="det_address" placeholder="请输入详细的地址" maxlength="200" style="display: block;width:290px;height: 30px;border:1px solid #83847e;color:#83847e;text-indent: 20px;overflow:hidden;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>邮箱</td>
                                        <td><input type="text" name="email" value="{{ $model->email }}" class="text" style="width:290px; text-indent: 20px; overflow:hidden;" readonly="readonly" id="email"></td>
                                        <td colspan="2"></td>
                                    </tr>
                                </table>
                                <div class="person_btn" style="text-align: center;">
                                    <button style="width:150px;height:35px;line-height:35px;color:#fff;margin-bottom:20px;margin-top:10px;background-color: #414141;" lay-submit lay-filter="*">提交</button>
                                    <!-- <strong style="display: block;clear:both;"></strong> -->

                                </div>
                            </form>
                        </div>
                        <div class="sec3"  style="display:none;">
                            <form action="{{ url('/newpass',[$model->id]) }}" method="post" >
                                {{ csrf_field() }}
                                <table id="person_pass" >
                                    <colgroup>
                                        <col width="200">
                                        <col width="182">
                                        <col width="160">
                                        <col width="180">
                                        <col width="180">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td><span style="color:red;width:5px;height: 5px;float: right">＊</span>旧 密 码</td>
                                            <td><input type="password" name="oldpass" value="{{ old('oldpass') }}" maxlength=15 class="text"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="reminder_validate" >
                                                    @if($errors->has('oldpass'))
                                                        <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                                                        {{$errors->first('oldpass')}}
                                                    @endif 
                                                </div> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span style="color:red;width:5px;height: 5px;float: right">＊</span>新 密 码</td>
                                            <td><input type="password" name="password" value="{{ old('password') }}" maxlength=15 class="text"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="reminder_validate" >
                                                    @if($errors->has('password'))
                                                        <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                                                        {{$errors->first('password')}}
                                                    @endif 
                                                </div> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span style="color:red;width:5px;height: 5px;float: right">＊</span>确认新密码</td>
                                            <td><input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" maxlength=15 class="text"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="reminder_validate" >
                                                    @if($errors->has('password'))
                                                        <img src="{{ asset('static/index/images/login/warning.png') }}" alt="">
                                                        {{$errors->first('password')}}
                                                    @endif 
                                                </div> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="person_btn" style="text-align: center;">
                                                    <input type="submit" name="" style="background-color: #414141;border:none;width:150px;height:35px;line-height:35px;color:#fff;margin-bottom:20px;margin-top:10px;"  value="提交" >
                                                    <!-- <strong style="display: block;clear:both;"></strong> -->

                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <!-- 地址 -->
                    <div class="sec8 sec hide">
                        <!-- 收货地址 -->
                        <div class="card_money">
                            收获地址管理 
                        </div>
                        @foreach($memaddress as $list)
                        <div class="smod_addres" style="margin-top: 10px;">
                            <p>常<br>用<br>地<br>址<br></p>
                            <div class="nickname">
                                <span >{{$list['shpeople']}} <em> 收</em></span>
                                 <span >
                                     <strong>{{$list['shaddress']}}</strong>
                                 </span>
                                 <span class="mobilenumber">
                                     {{$list['shphone']}}
                                </span>
                                <div style="margin-left:30px;margin-top:10px;"> 邮编：<a style="display:inline; margin-left:10px;">{{$list['shpostcode']}}</a></div>
                                
                            </div>
                            <div class="opera" >
                                <a href="javascript:;" class="black oneMore"><input type="hidden" name="id" value="{{$list['id']}}">删除</a>   
                            </div>
                        </div>
                        @endforeach
                        <div class="new_addres">
                            <a href="javascript:;" onclick="" class="add_address">
                            添加新地址
                             </a>   
                        </div>
                        <div id="add" >
                            <div id="content-left" class="demo">
                                    
                                        <table>
                                            <tr>
                                                <td class="one">
                                                   
                                                    收 货 人 :
                                                </td>
                                                <td class="two">
                                                    <input type="text" name="shpeople" style="width:200px;height:30px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="one">
                                                    
                                                    手机号码 :
                                                </td>
                                                <td class="two">
                                                    <input type="text" name="shphone" style="width:200px;height:30px;" id="shphone" onblur="test2_()">
                                                </td>
                                            </tr>

                                        </table>
                                        <div class="infolist">
                                            <div class="liststyle">
                                                <span id="Province">
                                                    <i>请选择省份</i>
                                                    <ul>
                                                        <li><a href="javascript:void(0)" alt="请选择省份">请选择省份</a></li>
                                                    </ul>
                                                    <input type="hidden" name="cho_Province" value="">
                                                </span>
                                                <span id="City">
                                                    <i>请选择城市</i>
                                                    <ul>
                                                        <li><a href="javascript:void(0)" alt="请选择城市">请选择城市</a></li>
                                                    </ul>
                                                    <input type="hidden" name="cho_City" value="">
                                                </span>
                                                <span id="Area">
                                                    <i>请选择地区</i>
                                                    <ul>
                                                        <li><a href="javascript:void(0)" alt="请选择地区">请选择地区</a></li>
                                                    </ul>
                                                    <input type="hidden" name="cho_Area" value="">
                                                </span>
                                            </div>
                                        </div>
                                        <table>
                                            <tr>
                                                <td class="one">
                                                   
                                                    地&nbsp;&nbsp;&nbsp;&nbsp;址 : &nbsp;&nbsp;
                                                </td>
                                                <td class="two">
                                                    <input class="dizhi" type="text" name="xxdizhi" style="width:200px;height:30px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="one">
                                                 
                                                    邮&nbsp;&nbsp;&nbsp;&nbsp;编:&nbsp;&nbsp;
                                                </td>
                                                <td class="two">
                                                    <input type="text" name="postcode" style="width:200px;height:30px;" id="postcode" onblur="test3_()"> 请您使用准确邮编
                                                </td>
                                            </tr>
                                            
                                          {{ csrf_field() }}
                                        </table>
                                        <div class="save_sumbmit">
                                             <input type="button" value="保存" style="width:160px;height:40px;background: #414141;color:#fff;outline: none;" id="baocun">
                                        </div>
                                    
                                </div>
                        </div>
                    </div>
                    <!-- 添加显示与隐藏 -->
                    <script type="text/javascript">

                      window.onload = function(){
                        var btn1 = document.getElementsByClassName('oneMore')[0];
                        
                        var btn = document.getElementsByClassName('add_address')[0];
                        
                        var divEle = document.getElementById('add');

                        btn.onclick = function(){
                           if(divEle.style.display == 'block'){
                              divEle.style.display = 'none';
                              btn.innerHTML = '添加新地址';
                              btn.style="color:#333";
                      
                           }else{
                              divEle.style.display = 'block';
                              btn.innerHTML = '取消';
                              btn.style="color:red";
                           } 
                          
                        }

                      }
                    </script>
                </div>
            </div>
            @include('flash::message')
        </div>
    </article>
    <script src="{{ asset('static/index/js/message/message.js') }}" charset="utf-8"></script>
    <script>
        //修改头像
        layui.use(['upload','form'], function(){
            var $ = layui.$
            var upload = layui.upload;
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var prc = $('#prc').val();
            var uploadInst = upload.render({
                elem: '#test' //绑定元素
                ,url: '{{ url("/file/newmember") }}' //上传接口
                ,field:'imgurl'
                ,data:{'id':prc}
                ,done: function(res){
                  $('#two').attr('src',res.data.src);
                  $('#picture').attr('src','/uploads/picture/'+res.data.src);
                  $.message('头像修改成功');
                }
                ,error: function(){
                  $.message({
                        message:'头像修改失败',
                        type:'error'
                    });
                }
            });
            $("#form").submit(function(e){
              //资料提交不刷新
              var val=$('input:radio[name="sex"]:checked').val();
              var name=$('#name').val();
              var zfpass=$('#zfpass').val();
              console.log(zfpass);
              var two=$('#two').val();
              var fere=$('#fere').val();
              var id=$('#prc').val();
              var phone1=$('#phone1').val();
              var productName=$('#productName').val();
              var test1=$('#test1').val();
              var marriage=$('#marriage').val();
              var det_address=$('#det_address').val();
              var email=$('#email').val();
              $.ajax({
                url:'{{ url("/memadress") }}',
                type:"POST",
                data:{
                    'id':id,
                    'name':name,
                    'phone1':phone1,
                    'productName':productName,
                    'test1':test1,
                    'marriage':marriage,
                    'val':val,
                    'det_address':det_address,   
                    'email':email,
                    'fere':fere,
                    'zfpass':zfpass
                },
                dataType:'text',
                success:function(res){
                    $.message('修改成功');
                },
                error:function(res){
                    $.message({
                        message:'修改失败',
                        type:'error'
                    });
                }
              })
              return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });
        });  
    </script>
    <script type="text/javascript">
     //验证邮编
     function test3_(){  
        var theinput=document.getElementById("postcode").value;
            var p1=/^[0-9]{6}$/;
            if(theinput==''){
                return false;
            }
            if(p1.test(theinput)==false) {          
                $.message({
                    message:'请填写正确的邮编',
                    type:'error'
                });       
                document.getElementById("postcode").value="";  
            }
            
      } 
     //验证手机号
     function test_(){  
        var theinput=document.getElementById("productName").value;
            var p1=/^(13[0-9]\d{8}|15[0-35-9]\d{8}|18[0-9]\d{8}|14[57]\d{8})$/;
            if(theinput==''){
                return false;
            }
            if(p1.test(theinput)==false) {          
                $.message({
                    message:'请填写正确电话号码',
                    type:'error'
                });       
                document.getElementById("productName").value="";  
            }
            
      } 
      function test2_(){  
        var theinput=document.getElementById("shphone").value;
            var p1=/^(13[0-9]\d{8}|15[0-35-9]\d{8}|18[0-9]\d{8}|14[57]\d{8})$/;
            if(theinput==''){
                return false;
            }
            if(p1.test(theinput)==false) {          
                $.message({
                    message:'请填写正确电话号码',
                    type:'error'
                });       
                document.getElementById("shphone").value="";  
            }
            
      }  
      function test1_(){  
        var theinput=document.getElementById("phone1").value;  
            var p1=/^(13[0-9]\d{8}|15[0-35-9]\d{8}|18[0-9]\d{8}|14[57]\d{8})$/;  
             //(p1.test(theinput));
             if(theinput==''){
                return false;
            }
            if(p1.test(theinput)==false) {          
                $.message({
                    message:'请填写正确电话号码',
                    type:'error'
                });          
                document.getElementById("phone1").value="";  
            }  
      }  
    </script>
    <script>
        //日期格式
        layui.use('laydate', function(){
          var laydate = layui.laydate;
          
          //执行一个laydate实例
          laydate.render({
            elem: '#test1' //指定元素
          });
        });
    </script>
    <script type="text/javascript">
     $(function(){
        $(".paypasswordcontainer").keyup(function(){
            $input_val=$(this).val();
            $input=$input_val.length;
            for (var x = 0; x <= 6; x++) {
                $("p").html($input);
                if ($input == 0) {
                    $(".sixpassword").find("i").eq(0).addClass("active").siblings("i").removeClass("active");
                    $(".sixpassword").find("b").css({"display": "none"});
                    $(".guangbiao").css({"left": 0});
                }
                else if ($input == 6) {
                    $(".sixpassword").find("b").css({"display": "block"});
                    $(".sixpassword").find("i").eq(5).addClass("active").siblings("i").removeClass("active");
                    $(".guangbiao").css({"left": 5 * 50});
                }else{
                    $(".sixpassword").find("i").eq($input).addClass("active").siblings("i").removeClass("active");
                    $(".sixpassword").find("i").eq($input).prevAll("i").find("b").css({"display":"block"});
                    $(".sixpassword").find("i").eq($input).nextAll("i").find("b").css({"display":"none"});
                    $(".guanbiao").css("left",$input*50);
                }
            }
        })
    })
    </script>
    <script type="text/javascript">
          var tijiao = document.getElementById('baocun');
          tijiao.onclick = function(){
          var shpeople = document.getElementsByName('shpeople')[0].value;
          var shphone = document.getElementsByName('shphone')[0].value;
          var province = document.getElementsByName('cho_Province')[0].value;
          var city = document.getElementsByName('cho_City')[0].value;
          var area = document.getElementsByName('cho_Area')[0].value;
          var dizhi = document.getElementsByName('xxdizhi')[0].value;
          var postcode = document.getElementsByName('postcode')[0].value;
          var btn = document.getElementsByClassName('add_address')[0];
          var divEle = document.getElementById('add');
          var shaddress = province+city+area+dizhi;
                $.ajax({  
                    cache: false,
                    type: "POST",
                    url: "/shopcar/creates",
                    data: {'shpeople':shpeople,'shphone':shphone,'shaddress':shaddress,'postcode':postcode},
                    async: true,//相当于ajax里的同步异步
                    dataType:'json',
                    success:function(msg){
                        if(msg.data === '请选择省份请选择城市请选择地区'){
                            $.message({
                                message:'请选择地址',
                                type:'error'
                            });
                        }else if(msg.data === ''){
                            $.message({
                                message:'添加失败',
                                type:'error'
                            });
                        }else{
                            $('.card_money').after("<div class='smod_addres'><p>常<br>用<br>地<br>址<br></p><div class='nickname'><span > "+shpeople+"<em> 收</em></span><span > <strong>"+shaddress+"</strong></span><span class='mobilenumber'>"+shphone+"</span><div style='margin-left:30px;margin-top:10px;'> 邮编：<a style='display:inline; margin-left:10px;'>"+postcode+"</a></div></div><div class='opera' ><a href='javascript:;' class='black oneMore'><input type='hidden' name='id' value=''>删除</a>   </div></div>");
                            divEle.style.display = 'none';
                            btn.innerHTML = '添加新地址';
                            btn.style="color:#333";
                            $("#content-left :input").val("");
                            $("#content-left :input ").last().val("保存");
                            $.message('添加成功');  
                        }
                        
                    },
                    error:function(msg){
                        $.message({
                            message:'添加失败',
                            type:'error'
                        });
                    }
                })
          }
          var opera = document.getElementsByClassName('opera');
          for (var i = 0; i<opera.length; i++) {
              
              opera[i].getElementsByClassName('oneMore')[0].onclick = function(){
                var id = this.getElementsByTagName('input')[0].value;
                var p = this.parentNode.parentNode;
                $.ajax({
                    type: "GET",
                    url: "/shopcar/destroys/"+id,
                    success:function(msg){
                        console.log(msg.data);
                       if(msg.data === ''){
                            $.message({
                            message:'删除失败,订单有这个地址',
                            type:'error'
                        });
                       }else{
                         p.remove();
                         $.message('删除成功');
                       }
                       
                    },
                    error:function(msg){
                        $.message({
                            message:'修改失败',
                            type:'error'
                        });
                    } 
                })
              }
          }
    </script>
                        <!-- 弹框 -->
<script>  
    // alert(ordnum);
        var btn = document.getElementsByClassName('showModel');
        var close = document.getElementsByClassName('close')[0];  
        var cancel = document.getElementsByClassName('cancel')[0];  
        var modal = document.getElementsByClassName('modal')[0];  
        var orderinput = document.getElementById('orderid');
        for (var i = btn.length - 1; i >= 0; i--) {
            btn[i].addEventListener('click', function(){  
             var app = this.getElementsByClassName('orderid')[0].value;
                 // console.log(app);
               
                orderinput.setAttribute('value',app);   
                modal.style.display = "block";  
            });   
             // console.log(btn[i]);
        }
       
        close.addEventListener('click', function(){  
            modal.style.display = "none";  
        });  
        cancel.addEventListener('click', function(){  
            modal.style.display = "none";  
        });  

        //确认收货
        var queren = document.getElementsByClassName('queren');
        for (var i = queren.length - 1; i >= 0; i--) {
            queren[i].addEventListener('click', function(){  
             var oid = this.getElementsByClassName('orid')[0].value;
                 // console.log(oid);
                $.ajax({  
                    cache: false,
                    type: "GET",
                    // url: '{{url("shopcar.update.id")}}',
                    url: "/orderhome/querensh/"+oid,
                    data: {},
                    async: true,//相当于ajax里的同步异步 
                    success:function(msg){
                        window.location.reload();
                    },
                    error:function(msg){
                        // alert("失败");
                    }
                })
               
                
            });   
             // console.log(btn[i]);
        }
</script>  
    @include('flash::message')

@endsection

@section('js')

@endsection 

