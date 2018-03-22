@extends('layouts.index.masterIndex')
@section('title', '个人中心')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/person.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/person3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/css/city.css') }}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('static/admin/lib/layui/layui.js') }}" charset="utf-8"></script>
    <script src="{{ asset('static/index/js/person.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/js/jquery.min_1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/js/city.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/index.js') }}" type="text/javascript"></script>
    <link rel="icon" href="../images/index_images/log_tb.jpg">
    
<!--     <link rel="stylesheet" href="./Purchase page.css" type="text/css">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="keywords" content="jQuery省市区三级联动" />
    <meta name="description" content="jQuery实现省、市、区三级联动的代码网上应该已经挺多了，今天群里一名成员投了篇关于省、市、区三级联动的实现代码，不同的一点是他将代码片段封装成了jQuery插件。" />
    <link href="./Province_css/city.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="./My Receiving address.js/jquery.min_1.js"></script>
    <script type="text/javascript" src="./My Receiving address.js/city.min.js"></script> -->

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
                        <div class="con_r">
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
                                         <span class="center-b"> 等待付款</span>
                                    </div>
                                  
                                </li>
                                <li>
                                    <div>
                                         <span class="center-a">消费时间：</span>
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
                                        <span class="center-c"> 等待付款</span>
                                        <input type="hidden" name="id" value="{{$list['id']}}" class="orderid">
                                        <a href='{{url("orderhome/destroy/$list[id]")}}'class="orderdel">取消订单</a>
                                    </div>
                                </li>
                            </ul>
                            <div style="margin-left: 10px;">
                                <p style="margin-bottom:10px;color:#777;">
                                    <span style="margin-right:20px; ">收货人：<strong style="color:#333;">{{ $list['memaddress']['shpeople']}}</strong></span>
                                    <span style="margin-right:20px;">收货地址：<strong style="color:#333;">{{ $list['memaddress']['shaddress']}}</strong></span>
                                </p>
                                <p style="margin-bottom:10px;color:#777;"  >
                                    <span style="margin-right:90px; ">收货人电话：<strong style="color:#333;">{{ $list['memaddress']['shphone']}}</strong></span>
                                    <span style="margin-right:10px; ">收货人邮编：<strong style="color:#333;">{{ $list['memaddress']['shpostcode']}}</strong></span>
                                </p>
                                
                                
                            </div>
                            @foreach($list['order_goods'] as $ordergoods ) 
                            <div class="con_bom">
                                 <img src="/uploads/picture/{{ $model->imgurl }}" alt="" >
                                 <div class="cona_left">
                                     <ul>
                                         <li>
                                            <span class="center-q">商品名称:</span>
                                             <span class="center-w">{{$ordergoods['goods']['name']}}</span>
                                         </li>
                                          <li>
                                             <span class="center-q">单价:</span>
                                             <span class="center-w">
                                            ￥<label >{{$ordergoods['goods']['unitprice']}}</label>
                                            </span>
                                         </li>
                                          <li>
                                              <span class="center-q">商品数量:</span>
                                             <span class="center-w">{{ $ordergoods['goods_num']}}</span>
                                         </li>
                                         <li>
                                              <span class="center-q">物流状态:</span>
                                             <span class="center-w">未发货</span>
                                         </li>
                                         <li>
                                             <span class="center-q">物流单号:</span>
                                             <span class="center-w"></span>
                                         </li>
                                        
                                     </ul>
                                 </div>
                                  
                            </div>
                            
                        </div>
                        <!-- 结束订单标号内容 -->

                        <div id="modal" class="modal" >  
                            <div class="modal-content">  
                                <header class="modal-header" >  
                                    <h4 style="margin-left:300px;border:none;">请输入支付密码</h4>  
                                    <span class="close">×</span>  
                                </header>  
                                <!-- form 表单信息 -->
                                 <form action="">

                                <div class="modal-body">  
                                       <div class="paycontainer">
                                        <input type="password" minlength="6" maxlength="6" class="paypasswordcontainer"
                                               oncontextmenu="return false" onpaste="return false" oncopy="return false"
                                               oncut="return false" autocomplete="off">
                                        <div class="sixpassword">
                                            <i class="active"><b></b></i>
                                            <i><b></b></i>
                                            <i><b></b></i>
                                            <i><b></b></i>
                                            <i><b></b></i>
                                            <i><b></b></i>
                                            <span class="guanbiao"></span>
                                        </div>
                                    </div>
                                    <p></p>  
                                    
                                </div>   
                                <div class="modal-footer" style="margin-bottom: 20px;"> 
                                    <button id="cancel">取消</button>  
                                    <button id="sure">确定</button>  
                                </div> 
                               </form>  
                            </div>  
                        </div>
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
                   <!-- 弹框 -->
                        <script>  
                            var btn = document.getElementById('showModel');  
                            var close = document.getElementsByClassName('close')[0];  
                            var cancel = document.getElementById('cancel');  
                            var modal = document.getElementById('modal');  
                            btn.addEventListener('click', function(){  
                                modal.style.display = "block";  
                            });  
                            close.addEventListener('click', function(){  
                                modal.style.display = "none";  
                            });  
                            cancel.addEventListener('click', function(){  
                                modal.style.display = "none";  
                            });  

                        </script>  
                           @endforeach
                        </div>
                        <!-- 结束订单标号内容 -->
                        @endforeach
                    </div>
                   
                   
                    <!-- 基本信息 -->
                   {{-- <div class="sec4 sec hide">
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

                                            <img src="/uploads/picture/{{ $model->imgurl }}" width="100px" height="100px" style="float:left;" id="picture" >
                                            <input type="hidden" name="imgurl" value="{{$model->imgurl}}" id="two">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 300px;">爱人名字</td>
                                        <td><input type="text" name="fere" value="{{ $model->fere }}" maxlength=15 class="text" style="text-indent: 20px;" id="fere"></td>
                                        <td>手机</td>
                                        <td><input type="text" name="phone" value="{{ $model->phone }}" maxlength=15 class="text" style="text-indent: 20px;" id="phone1" onblur="test1_()">
                                        </td>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td>爱人手机</td>
                                        <td><input type="text" name="fere_phone" value="{{ $model->fere_phone }}" maxlength=15 class="text" style="text-indent: 10px;" id="productName" onblur="test_()"></td>
                                        
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
                        <!-- 产品信息 -->
                        <div class="smod_addres" style="margin-bottom: 5px;">
                            <p>常<br>用<br>地<br>址<br></p>
                            <div class="nickname">
                                <span >niu<em>收</em></span>
                                 <span >
                                     <strong>山西省</strong><strong>运城市</strong><strong>盐湖区</strong><em style="font-style:normal">北城街道货场路</em>
                                 </span>
                                 <span class="mobilenumber">
                                     15234375791
                                </span>
                                <div style="margin-left:30px;margin-top:10px;"> 邮编：<a style="display:inline; margin-left:10px;">044200</a></div>
                                
                            </div>
                            <div class="opera">
                            <!--如果这里出现2操作就在第一个上面加oneMore,出现3个的加More-->
                            <a href="javascript:;" onclick="popWinAddressDivEdit('221270','niu',
                                '6','128','1163','盐湖区','15234375791','','1','044000');" class="black oneMore">删除</a>
                            </div>

                        </div>
                        <div class="new_addres">
                            <a href="javascript:;" onclick="" class="add_address">
                            添加新地址
                             </a>   
                        </div>
                         <div id="add" >
                            <form action="" method="post">
                                
                                <table>
                                    <tr>
                                        <td class="one">
                                            
                                            收 货 人 :&nbsp;&nbsp;
                                        </td>
                                        <td class="two">
                                            <input type="text" name="shpeople" style="width:200px;height:30px;">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="one">
                                            手机号码 :&nbsp;&nbsp;
                                        </td>
                                        <td class="two">
                                            <input type="text" name="shphone" style="width:200px;height:30px;">
                                        </td>
                                        <td></td>
                                    </tr>   
                                </table>

                                <div id="content-wrap">     
                                    <div id="content-left" class="demo">
                                        <form action="{{ url('/memadress',[$model->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="xzshdi" style="height:50px;">
                                                <span style="display: inline-block;margin-top:10px;">* 所在地址</span>
                                                <div style="margin-left: 20px;margin-top:-10px;">

                                                    <span>
                                                        
                                                        
                                                        <div class="infolist" style="margin-left:20px; margin-top: -14px;">
                                                            <div class="liststyle" style="margin-left:0;">
                                                                <span id="Province" >
                                                                    <i>请选择省份</i>
                                                                    <ul style="height:200px;overflow:auto;">
                                                                        <li><a href="javascript:void(0)" alt="请选择省份">请选择省份</a></li>
                                                                    </ul>
                                                                    <input type="hidden" name="cho_Province" value="请选择省份">
                                                                </span>
                                                                <span id="City">
                                                                    <i>请选择城市</i>
                                                                   <ul style="height:200px;overflow:auto;">
                                                                        <li><a href="javascript:void(0)" alt="请选择城市">请选择城市</a></li>
                                                                    </ul>
                                                                    <input type="hidden" name="cho_City" value="请选择城市">
                                                                </span>
                                                                <span id="Area">
                                                                    <i>请选择地区</i>
                                                                    <ul style="height:200px;overflow:auto;">
                                                                        <li><a href="javascript:void(0)" alt="请选择地区">请选择地区</a></li>
                                                                    </ul>
                                                                    <input type="hidden" name="cho_Area" value="请选择地区">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                            <table>
                                               <tr>
                                                    <td class="one">
                                                       
                                                        地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址 :&nbsp;&nbsp; 
                                                    </td>
                                                    <td class="two">
                                                        <input class="dizhi" type="text" name="shadress" style="width:200px;height:30px;">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="one">
                                                       
                                                        邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编 :&nbsp;&nbsp; 
                                                    </td>
                                                    <td class="two">
                                                        <input type="text" name="shpostcode" style="width:200px;height:30px;"> 
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </form> 
                                    </div>
                                   
                                </div>
                                <div class="save_sumbmit">
                                    <input type="submit" value="保存" style="width:100px;height:30px;">
                                    
                                </div>
                            </form>
                        </div>
                    </div>--}}
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
                      
                      //      }else{
                      //         divEle.style.display = 'block';
                      //         btn.innerHTML = '取消';
                      //         btn.style="color:red";
                      //      } 
                          

                        }

                      }
                    </script>
                </div>
            </div>
            @include('flash::message')
        </div>
    </article>
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
                  alert('头像修改成功');
                }
                ,error: function(){
                  //请求异常回调
                }
            });
            $("#form").submit(function(e){
              //资料提交不刷新
              var val=$('input:radio[name="sex"]:checked').val();
              var name=$('#name').val();
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
                    'fere':fere
                },
                dataType:'text',
                success:function(res){
                    alert('修改成功');
                },
                error:function(res){
                    alert('修改失败');
                }
              })
              return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });

        });  
    </script>
    <script type="text/javascript">
        //验证手机号
     function test_(){  
        var theinput=document.getElementById("productName").value;
            var p1=/^(13[0-9]\d{8}|15[0-35-9]\d{8}|18[0-9]\{8}|14[57]\d{8})$/;
            if(theinput==''){
                return false;
            }
            if(p1.test(theinput)==false) {          
                alert('请填写正确电话号码!!');           
                document.getElementById("phone1").value="";  
            }
            
      }  
      function test1_(){  
        var theinput=document.getElementById("phone1").value;  
            var p1=/^(13[0-9]\d{8}|15[0-35-9]\d{8}|18[0-9]\{8}|14[57]\d{8})$/;  
             //(p1.test(theinput));
             if(theinput==''){
                return false;
            }
            if(p1.test(theinput)==false) {          
                alert('请填写正确电话号码!!');           
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
    @include('flash::message')

@endsection

@section('js')

@endsection 

