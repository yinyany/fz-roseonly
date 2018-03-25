@extends('layouts.index.masterIndex')
@section('title', '【roseonly高端定制】定制鲜花礼品_高端礼物定制_roseonly诺誓官网')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/detail.css') }}">
    <script src="{{ asset('static/index/js/detail.js') }}" type="text/javascript"></script>
    <!-- <script src="{{ asset('static/index/js/detail2.js') }}" type="text/javascript"></script> -->
@endsection 


@section('content')
    <!-- 主题内容区域 -->
    <article>
        <div id="content">
            <div id="fadeDiv">
                <div class="fadeDiv">
                    <div class="fadeLeft">
                        <ul>
                            <li style="display: block;"><img src="/uploads/good/{{ $list->imgurl }}"  width="350" height="350" ></li>                           
                        </ul>
                        <ol>
                             <li class="selected"><img src="/uploads/good/{{ $list->imgurl }}" width="55" height="55"></li>
                        </ol>
                    </div>
                    <input type="hidden" name="id" value="{{ $list->id }}" id="id">
                    <div class="pro_det">
                        <p>{{ $list->name }}</p>

                        <div class="price">
                             <p class="font">价格：</p>
                             <p>¥{{ $list->price }}</p>
                             <strong style="display: block;clear:both;"></strong>   
                        </div>
                        <p class="font">商品属性：</p>
                        <div class="color">
                            <div class="color_img">
                               {!! shopStr2Arr($list->bid) !!}
                                <strong style="display: block;clear:both;"></strong> 
                            </div>
                            <strong style="display: block;clear:both;"></strong>  
                        </div>
                        <div class="number">
                            <p class="font">数量：</p>
                            <div id="num_box">
                                <input id="number" type="text" value="1" maxlength="2">
                                <ul>
                                    <li class="plus">+</li>
                                    <li class="reduce">-</li>
                                </ul>
                                <span style="color: red; margin: 10px 0px 0px 60px;" >剩余库存：<strong id="kucun">{{ $list->stock }}</strong> 个</span>
                                <strong style="display: block;clear:both;"></strong>

                            </div>

                        </div>
                        <div class="buy">
                            <p class="immediately" ><a href="javascript:;" id="shop">立即购买</a></p>
                            <p class="join" ><a href="javascript:;" id="shopping">加入购物车</a></p>
                            <strong style="display: block;clear:both;"></strong>
                        </div>
                        <p class="service">服务承诺：官方正品 免费配送 同城速递</p>
                        <strong style="display: block;clear:both;"></strong>
                    </div> 
                    <strong style="display: block;clear:both;"></strong>    
                </div>
            </div>

            <div id="detail">
                <img src="{{ asset('static/index/images/details/xq_08.png') }}">
                <h2 class="title"><span style="color: red;">商品详情</span><span>买家评论</span></h2>
                <div class="cont">
                    <div calss="img" style="display: block">
                       {!! $list->content !!}
                        <strong style="display: block;clear: both;"></strong>
                    </div>
                    <div class="comment">
                        <ul id="pn">
                            <!-- //评论 -->
                            @foreach($comment as $values)
                                <li class="list0">
                                      <!-- 首次评论用户个人头像 -->
                                      <div class="head"><img src="/uploads/picture/{{ $values->member->imgurl }}" width="60px" height="60px"> </div>
                                      <!-- 首次评论内容 -->
                                      <div class="content">
                                          <p class="text">
                                            <span class="name">{{$values->member->name}}：</span>
                                            {{ $values->content }}
                                          </p> 
                                      <!-- 评论时间 -->
                                      <div class="good">
                                          <span class="date">{{ $values->created_at }}</span>
                                      </div>
                                      <div class="people"></div>
                                            <!-- 追加评论1 -->
                                            <div class="comment-list">
                                                <div class="comment" user="self">
                                                      <div class="comment-right">
                                                          <div class="comment-text">
                                                              <!-- 追加评论用户 -->
                                                              <span class="user">管理员:</span>
                                                              <!-- 追加评论内容 -->
                                                               {{ $values->reply }}
                                                          </div>
                                                      </div>
                                                </div>
                                            </div>
                                      </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>   
            </div>



            <div id="recommend">
                <div id="title">
                    <span class="best" style="font-size:20px;"><b>热卖推荐</b></span>
                    <p class="btn"><span class="selected1">1</span><span>2</span></p>
                </div> 
                <div id="con" class="recom">        
                    <ul style="display:block;">
                        <li>
                            <p><img src="{{ asset('static/index/images/details/recom1.png') }}" alt="" width="200" height="200"></p>
                            <p>鲜花玫瑰 - 经典永续系列</p>
                            <p>经典初心 80cm长形</p>
                            <p>￥1999</p>
                        </li>
                        <li>
                            <p><img src="{{ asset('static/index/images/details/recom8.png') }}" alt="" width="200" height="200"></p>
                            <p>玫瑰珠宝 - 星座经典系列</p>
                            <p>摩羯座 中型项链</p>
                            <p>￥2399</p>
                        </li>
                        <li>
                            <p><img src="{{ asset('static/index/images/details/recom6.png') }}" alt="" width="200" height="200"></p>
                            <p>鲜花玫瑰 - 经典永续系列</p>
                            <p>经典初心 80cm长形</p>
                            <p>￥1999</p>
                        </li>
                        <li>
                            <p><img src="{{ asset('static/index/images/details/recom3.png') }}" alt="" width="200" height="200"></p>
                            <p>鲜花玫瑰 - 经典永续系列</p>
                            <p>经典朱砂 80cm长形</p>
                            <p>￥1520</p>
                        </li>
                        <strong style="display: block;clear: both;"></strong>
                    </ul>
                    <ul style="display:none;">
                        <li>
                            <p><img src="{{ asset('static/index/images/details/01.png') }}" alt="" width="200" height="200"></p>
                            <p>鲜花玫瑰 - 经典永续系列</p>
                            <p>经典初心 80cm长形</p>
                            <p>￥2000</p>
                        </li>
                        <li>
                            <p><img src="{{ asset('static/index/images/details/02.png') }}" alt="" width="200" height="200"></p>
                            <p>玫瑰珠宝 - 星座经典系列</p>
                            <p>摩羯座 中型项链</p>
                            <p>￥2000</p>
                        </li>
                        <li>
                            <p><img src="{{ asset('static/index/images/details/03.png') }}" alt="" width="200" height="200"></p>
                            <p>鲜花玫瑰 - 经典永续系列</p>
                            <p>经典初心 80cm长形</p>
                            <p>￥2000</p>
                        </li>
                        <li>
                            <p><img src="{{ asset('static/index/images/details/04.png') }}" alt="" width="200" height="200"></p>
                            <p>鲜花玫瑰 - 经典永续系列</p>
                            <p>经典朱砂 80cm长形</p>
                            <p>￥2000</p>
                        </li>
                        <strong style="display: block;clear: both;"></strong>
                    </ul>
                </div>
            </div>
            <strong style="display: block;clear: both;"></strong>
        </div>
        @include('flash::message')
    </article>
    <script type="text/javascript">
        // console.log($('#shop'));
        $(function(){
            $('#shop').click(function(){
               var val = $('#number').val();
               var id = $('#id').val();
                $.ajax({
                    type: "GET",
                    url: "/shopcar/shop",
                    data: {'val':val,'id':id},
                    async: false,//相当于ajax里的同步异步
                    success:function(msg){

                      window.location.href="/shopcar/shops/"+msg.data.id+"/"+msg.data.val;   
                    },
                    error:function(msg){
                        
                    }
                })
            })
            $('#shopping').click(function(){
               var val = $('#number').val();
               var id = $('#id').val();
               // console.log(val);
                $.ajax({
                    type: "GET",
                    url: "/shopcar/shop",
                    data: {'val':val,'id':id},
                    async: false,//相当于ajax里的同步异步
                    success:function(msg){ 
                         window.location.href="/shopping/"+msg.data.id+"/"+msg.data.val;
                    },
                    error:function(msg){
                        
                    }
                })
            })
        })
        
    </script>
@endsection

@section('js')
   
@endsection 

