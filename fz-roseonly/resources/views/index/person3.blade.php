@extends('layouts.index.masterIndex')
@section('title', '个人中心')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/person.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/css/city.css') }}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('static/admin/lib/layui/layui.js') }}" charset="utf-8"></script>
    <script src="{{ asset('static/index/js/person.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/js/jquery.min_1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/js/city.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/index.js') }}" type="text/javascript"></script>
    <style type="text/css">
        .file {
            position: relative;
            display: inline-block;
            background: #ccc;
            border: 1px solid #99D3F5;
            border-radius: 4px;
            padding: 4px 12px;
            overflow: hidden;
            color: #1E88C7;
            text-decoration: none;
            text-indent: 0;
            line-height: 20px;
            cursor: pointer;
        }
        .file input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }
        .file:hover {
            background: #ccc;
            border-color: #78C3F3;
            color: #004974;
            text-decoration: none;
            cursor: pointer;
        }
        .layui-upload-file{
            display: none;
        }
    </style>
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
                                 <img src="{{ asset('static/index/images/index/decoration1.png') }}" alt="" >
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
                                             <span class="center-w">未发货</span>
                                         </li>
                                         <li>
                                             <span class="center-q">物流单号:</span>
                                             <span class="center-w"></span>
                                         </li>
                                        
                                     </ul>
                                 </div>
                                  
                            </div>
                           @endforeach
                        </div>
                        <!-- 结束订单标号内容 -->
                        @endforeach
                    </div>
                   
                   
                    <!-- 基本信息 -->
                    <div class="sec4 sec hide">
                        <h3>
                            <a href="javascript:;" class="person_hover">基本信息</a>
                            <a href="javascript:;">修改密码</a>
                        </h3>
                        <div class="sec3" class="selected1">
                            <iframe name="formsubmit" style="display:none;">    
                            </iframe>
                            <form action='{{ url("/newmember/$model->id") }}' method="post" target="formsubmit">
                                {{ csrf_field() }}
                                
                                <table id="person_info">
                                    <colgroup>
                                        <col width="120">
                                        <col width="182">
                                        <col width="160">
                                        <col width="240">
                                        <col width="232">
                                    </colgroup>
                                     <tr>
                                        <td></td>
                                        <td></td>
                                        <td>姓名</td>
                                        <td>
                                            <input type="text" name="name" maxlength=15 class="text" value="{{ $model->name }}" style="text-indent: 20px;" readonly="readonly">
                                        </td>
                                        <td colspan="2" rowspan="3">
                                            <!-- 上传的头像 -->

                                            <img src="/uploads/picture/{{ $model->imgurl }}" width="100px" height="100px" style="float:left;" id="picture" >
                                            <input type="hidden" name="imgurl" value="{{$model->imgurl}}" id="two">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>爱人名字</td>
                                        <td><input type="text" name="fere" value="{{ $model->fere }}" maxlength=15 class="text" style="text-indent: 20px;"></td>
                                        @if($errors->has('fere')) {{$errors->first('fere')}} @endif
                                        <td>手机</td>
                                        <td><input type="text" name="phone" value="{{ $model->phone }}" maxlength=15 class="text" style="text-indent: 20px;" id="phone1" autofocus="">
                                        @if($errors->has('phone')) {{$errors->first('phone')}} @endif
                                        </td>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td>爱人手机</td>
                                        <td><input type="text" name="fere_phone" value="{{ $model->fere_phone }}" maxlength=15 class="text" style="text-indent: 20px;"></td>
                                        @if($errors->has('fere_phone')) {{$errors->first('fere_phone')}} @endif
                                        <td>生日</td>
                                        <td><input type="text" name="birthday" value="{{ $model->birthday }}" maxlength=15 class="text" style="text-indent: 20px;"></td>
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
                                        <td>性别</td>
                                        <td>
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
                                        <td>居住地</td>

                                        <td colspan="2">
                                            <input type="text" name="address" value="{{ $model->address }}" id="det_address" placeholder="请输入详细的地址" maxlength="200" style="display: block;width:350px;height: 30px;border:1px solid #83847e;color:#83847e;text-indent: 20px;">
                                        </td>
                                    </tr>
                             
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>邮箱</td>
                                        <td><input type="text" name="email" value="{{ $model->email }}" class="text" style="width:350px; text-indent: 20px;"></td>
                                        <td colspan="2"></td>
                                    </tr>
                                </table>
                                <div class="person_btn" style="text-align: center;">
                                    <input type="submit" name="" style="background-color: #414141;border:none;width:150px;height:35px;line-height:35px;color:#fff;margin-bottom:20px;margin-top:10px;"  value="提交">
                                    <!-- <strong style="display: block;clear:both;"></strong> -->

                                </div>

                            </form>
                        </div>
                        <div class="sec3"  style="display:none;">
                            <form action="{{ url('/newpass',[$model->id]) }}" method="post">
                                {{ csrf_field() }}
                                <table id="person_pass">
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
                                                    <input type="submit" name="" style="background-color: #414141;border:none;width:150px;height:35px;line-height:35px;color:#fff;margin-bottom:20px;margin-top:10px;"  value="提交">
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
                        <div class="card_money">
                            收获地址管理 
                        </div>
                        @foreach($memaddress as $list)
                        <div class="smod_addres">
                            <p>常<br>用<br>地<br>址<br></p>
                            <div class="nickname">
                                <span >niu<em>收</em></span>
                                 <span >
                                     <strong></strong>
                                 </span>
                                 <span class="mobilenumber">
                                     15234375791
                                </span>
                                
                            </div>
                            <div class="opera">
                            <!--如果这里出现2操作就在第一个上面加oneMore,出现3个的加More-->
                            <a href="javascript:;" onclick="popWinAddressDivEdit('221270','niu',
                                '6','128','1163','盐湖区','15234375791','','1','044000');" class="black oneMore">编辑</a>
                            </div>
                        </div>
                        @endforeach
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
                                            <input type="text" name="" style="width:200px;height:30px;">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="one">
                                            手机号码 :&nbsp;&nbsp;
                                        </td>
                                        <td class="two">
                                            <input type="text" name="" style="width:200px;height:30px;">
                                        </td>
                                        <td></td>
                                    </tr>   
                                </table>
                                <div id="content-wrap">     
                                    <div id="content-left" class="demo">
                                        <form action="" name="form1">

                                            <div class="infolist">
                                                <div class="liststyle">
                                                    <span id="Province">
                                                        <i>请选择省份</i>
                                                        <ul>
                                                            <li><a href="javascript:void(0)" alt="请选择省份">请选择省份</a></li>
                                                        </ul>
                                                        <input type="hidden" name="cho_Province" value="请选择省份">
                                                    </span>
                                                    <span id="City">
                                                        <i>请选择城市</i>
                                                        <ul>
                                                            <li><a href="javascript:void(0)" alt="请选择城市">请选择城市</a></li>
                                                        </ul>
                                                        <input type="hidden" name="cho_City" value="请选择城市">
                                                    </span>
                                                    <span id="Area">
                                                        <i>请选择地区</i>
                                                        <ul>
                                                            <li><a href="javascript:void(0)" alt="请选择地区">请选择地区</a></li>
                                                        </ul>
                                                        <input type="hidden" name="cho_Area" value="请选择地区">
                                                    </span>
                                                </div>
                                            </div>
                                            <table>
                                               <tr>
                                                    <td class="one">
                                                       
                                                        地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址 :&nbsp;&nbsp; 
                                                    </td>
                                                    <td class="two">
                                                        <input class="dizhi" type="text" name="" style="width:200px;height:30px;">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="one">
                                                       
                                                        邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编 :&nbsp;&nbsp; 
                                                    </td>
                                                    <td class="two">
                                                        <input type="text" name="" style="width:200px;height:30px;"> 
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </form> 
                                    </div>
                                   

                                <div class="save_sumbmit">
                                    <input type="submit" value="保存" style="width:100px;height:30px;">
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- 添加显示与隐藏 -->
                    <script type="text/javascript">
                      // window.onload = function(){
                      //   var btn = document.getElementsByClassName('add_address')[0];
                      //   var divEle = document.getElementById('add');
                      //   btn.onclick = function(){
                      //      if(divEle.style.display == 'block'){
                      //         divEle.style.display = 'none';
                      //         btn.innerHTML = '添加新地址';
                      //         btn.style="color:#333";

                      //      }else{
                      //         divEle.style.display = 'block';
                      //         btn.innerHTML = '取消';
                      //         btn.style="color:red";
                      //      } 
                          
                      //   }
                      // }
                    </script>
                </div>
            </div>
            @include('flash::message')
        </div>
    </article>
    <script>
        layui.use('upload', function(){
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
                }
                ,error: function(){
                  //请求异常回调
                }
            });

            // $('.orderdel').click(function(){
            //     var orderid = $('.orderid').val();
            //     $.ajax({
            //         type:"GET",
            //         url: '{{ url("orderhome/destroy/orderid")}}',
            //         success:function(msg){
            //             console.log(msg);
            //         }
            //     })
            // })  
        });  
    </script>
    @include('flash::message')

@endsection

@section('js')

@endsection 

