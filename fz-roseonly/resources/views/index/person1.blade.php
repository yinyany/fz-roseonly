@extends('layouts.index.masterIndex')
@section('title', '订单页')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/person1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/css/city.css') }}">
    <script src="{{ asset('static/index/js/js/jquery.min_1.js" type="text/javascript') }}"></script>
    <script src="{{ asset('static/index/js/js/city.min.js" type="text/javascript') }}"></script>
    <script src="{{ asset('static/index/js/index.js" type="text/javascript') }}"></script>
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
                        <div class="order-nav">填写核对订单信息</div>
                        <div class="per-nav">收货人信息</div>
                        <div class="per_ada">
                            <input type="checkbox" name="" >
                            <div class="nickper">
                                <span id="product_address_221270">niu<i></i>&nbsp;山西省运城市盐湖区&nbsp;盐湖区  邮编:044000  手机:15234375791</span>

                            </div>

                        </div>
                        <div class="per_ada">
                            <input type="checkbox" name="" label>
                            <div class="nickper">
                                <span id="product_address_221270">niu<i></i>&nbsp;山西省运城市盐湖区&nbsp;盐湖区  邮编:044000  手机:15234375791</span>

                            </div>
                            
                        </div>

                        <span class="tianjia" id="tianjia">添加新地址</span>
                        <div id="content-wrap">     
                            <div id="content-left" class="demo">
                                <form action="" name="form1">
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
                                                <input type="text" name=""style="width:200px;height:30px;">
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
                                                <input type="text" name=""style="width:200px;height:30px;"> 请您使用准确邮编
                                            </td>
                                        </tr>
                                        

                                    </table>
                                    <div class="save_sumbmit">
                                         <input type="submit" value="保存" style="width:100px;height:30px;">
                                    </div>
                                </form> 
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
                        <!-- 商品清单信息 -->
                        <div class="com_list">
                            <!-- 左边商品 -->
                            <div class="com_left">
                                <img src="{{ asset('static/index/images/details/recom8.png') }}" alt="">
                                <div class="com_pay1">
                                    <span >商品名称：</span>
                                    <span>项圈狗-18K双色金-项链</span>
                                    <p>
                                        <span >商品数量：</span>
                                        <span >6</span>
                                    </p>
                                    <p>
                                        <span >商品单价：</span>
                                        <span >¥3999.0</span>
                                    </p>
                                </div>
                            </div>
           
                        </div><!--商品清单信息-->
                        <div class="area_right">
                            <p>
                               <strong>总计：</strong>
                               <strong >￥3999</strong>
                            </p>
                            
                        </div>
                        <div class="pay_submit">
                            <a href=""><input type="submit" value="提交订单"></a>
                        </div>
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
