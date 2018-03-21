@extends('layouts.index.masterIndex')
@section('title', '订单页')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/person1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/css/city.css') }}">
   
@endsection 


@section('content')
    <!-- 主题内容区域 -->
    <article>
        <div id="content">
            <div id="line"></div>
            <div id="order">
                <!-- 导航 -->
                <div class="order_con">
                    <!-- 我的订单信息 -->
                    <div class="sec1 sec ">
                        <form action='{{url("/shopcar/store")}}' method="post" >
                            {{ csrf_field()}}
                            <div class="order-nav">填写核对订单信息</div>
                            <div class="per-nav">收货人信息</div>
                            @foreach($memaddress as $list)
                            <div class="per_ada">
                                <input type="radio" name="shaddress_id" value={{$list['id']}} checked>
                                <div class="nickper" >
                                    <span>收件人：{{$list['shpeople']}}&nbsp;&nbsp;地址：{{$list['shaddress']}}&nbsp;&nbsp;邮编:{{$list['shpostcode']}}&nbsp;&nbsp;手机:{{$list['shphone']}}</span>
                                </div>
                            </div>
                            @endforeach
        
                            <span class="tianjia" id="tianjia">添加新地址</span>
                            <div id="content-wrap">     
                                <div id="content-left" class="demo">
                                    
                                        <table>
                                            <tr>
                                                <td class="one">
                                                   
                                                    收 货 人 :
                                                </td>
                                                <td class="two">
                                                    <input type="text" name="" style="width:200px;height:30px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="one">
                                                    
                                                    手机号码 :
                                                </td>
                                                <td class="two">
                                                    <input type="text" name="" style="width:200px;height:30px;">
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
                                                   
                                                    地&nbsp;&nbsp;&nbsp;&nbsp;址 : &nbsp;&nbsp;
                                                </td>
                                                <td class="two">
                                                    <input class="dizhi" type="text" name=""style="width:200px;height:30px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="one">
                                                 
                                                    邮&nbsp;&nbsp;&nbsp;&nbsp;编:&nbsp;&nbsp;
                                                </td>
                                                <td class="two">
                                                    <input type="text" name="" style="width:200px;height:30px;"> 请您使用准确邮编
                                                </td>
                                            </tr>
                                            

                                        </table>
                                        <div class="save_sumbmit">
                                             <input type="submit" value="保存" style="width:100px;height:30px;">
                                        </div>
                                    
                                </div>
                                <div id="content-right"></div>
                            </div>
            
                             <div class="per-nav1">配送及支付方式</div>
                              
                            <p>
                                支付方式：<span>在线支付</span>
                            </p>
                            <div class="per_cor_2"> 
                                <span class="w60">配送方式 :&nbsp;</span> 
                                <label > 快递运输 </label>
                            </div>
                            <div class="per-nav">商品清单</div>
                             @foreach($shopinfo as $list)
                            <!-- 商品清单信息 -->
                            <div class="com_list">
                                <!-- 左边商品 -->
                                <div class="com_left">
                                    <img src="{{ asset('static/index/images/details/recom8.png') }}" alt="">
                                    <div class="com_pay1">
                                        <span >商品名称：</span>
                                        <span>{{$list['goods']['name']}}</span>
                                        <p>
                                            <span >商品数量：</span>
                                            <span >{{$list['num']}}</span>
                                        </p>
                                        <p>
                                            <span >商品单价：</span>
                                            <span >{{$list['goods']['unitprice']}}</span>
                                        </p>
                                    </div>
                                </div>
                                
                            </div><!--商品清单信息-->
                            @endforeach
                            <div class="area_right">
                                <p style="width:150px;">
                                   <strong>总计：{{$totalprices}}</strong>
                                   <strong >元</strong>
                                </p>
                                
                            </div>
                            <div class="pay_submit">
                                <input type="hidden" name="godid" value="{{$goid}}">
                                <input type="hidden" name="godnum" value="{{$gonum}}">
                                <input type="hidden" name="totalprice" value="{{ $totalprices }}">
                                <input type="hidden" name="created_at" value="{{date('Y-m-d H:i:s')}}">
                                <input type="hidden" name="ordernum" value="{{ date('YmdHis').rand(100,200) }}">
                                <input type="submit" value="提交订单">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection

@section('js')
    <!-- 添加显示与隐藏 -->
    <script type="text/javascript">
      window.onload = function(){
        var btn = document.getElementsByClassName('tianjia')[0];
        var divEle = document.getElementById('content-wrap');
        btn.onclick = function(){
           if(divEle.style.display == 'block'){
              divEle.style.display = 'none';
              btn.innerHTML = '添加新地址';
              btn.style = 'color:#414141';

           }else{
              divEle.style.display = 'block';
              btn.innerHTML = '取消';
              btn.style = 'color:red';
           } 
          
        }
      }
    </script>
@endsection 
