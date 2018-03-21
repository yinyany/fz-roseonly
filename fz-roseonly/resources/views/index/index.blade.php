@extends('layouts.index.masterIndex')
@section('title', '首页')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/index.css') }}">
    <script src="{{ asset('static/index/js/index.js') }}" type="text/javascript"></script>
@endsection 


@section('content')
    <!-- 主题内容区域 -->
    <article>
        <div id="content">
            <!-- 轮播图 -->
            <div id="banner">
                <!-- 轮播图片 -->
                <ul class="banner">
                    @foreach($banner as $v)
                    <li><img src="/uploads/banner/{{ $v->imgurl }}" alt=""></li>
                    @endforeach
                </ul>
                <!-- 点击按钮-->
                <ul class="icon cl">
                    <li class="banner_hover"></li>
                    @for($i = 1;$i < $count;$i++)
                        <li></li>
                    @endfor
                </ul>
                <!-- 左右箭头 -->
                <div class="arrow">
                    <span class="left">‹</span>
                    <span class="right">›</span>
                </div>
            </div>

            <!-- banner下的 品牌 分类 -->
            <div id="brand">
                <ul>
                    <li>
                        <a href="javascript:;"><img src="{{ asset('static/index/images/index/index_brand1.jpg') }}" alt="roseonly新品上市" title="新品上市" width="288" height="280"></a>
                        <span>新品上市</span>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="{{ asset('static/index/images/index/index_brand2.jpg') }}" alt="roseonly经典热卖" title="经典热卖" width="288" height="280"></a>
                        <span>经典热卖</span>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="{{ asset('static/index/images/index/index_brand3.jpg') }}" alt="roseonly当月星座" title="当月星座" width="288" height="280"></a>
                        <span>当月星座</span>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="{{ asset('static/index/images/index/index_brand4.jpg') }}" alt="roseonly明星同款" title="明星同款" width="288" height="280"></a>
                        <span>明星同款</span>
                    </li>
                </ul>
                <div class="cl"></div>
            </div>


            <!-- 首页推荐recommend -->
            <div id="recommend">
                <h2>热卖单品推荐</h2>
                <!-- 选项卡 -->
                <div class="product">
                    <!-- 标题 -->
                    <ul class="title">
                        <li class="product_hover"><a href="javascript:;">鲜花玫瑰</a><span></span></li>
                        <li><a href="javascript:;">永生玫瑰</a><span></span></li>
                        <li><a href="javascript:;">玫瑰珠宝</a><span></span></li>
                        <li><a href="javascript:;">玫瑰饰品</a></li>
                    </ul>
                    <!-- 产品 -->
                    <div class="list">
                        <ul class="flower">
                            <li>
                                <a href="javascript:;" title="经典-许愿">
                                    <img src="{{ asset('static/index/images/index/flower1.png') }}" alt="经典永续 - 经典19支许愿 80cm长形" title="经典永续 - 经典19支许愿 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 许愿</span>
                                        <span class="spec">鲜花玫瑰 80cm长形 </span><!-- 规格 -->
                                        <span class="price">￥ 2399.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/flower2.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/flower3.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/flower4.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/flower5.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/flower6.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/flower7.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/flower8.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <p class="cl"></p>
                        </ul>
                        <ul class="rose" style="display: none;">
                            <li>
                                <a href="javascript:;" title="经典-许愿">
                                    <img src="{{ asset('static/index/images/index/rose1.png') }}" alt="经典永续 - 经典19支许愿 80cm长形" title="经典永续 - 经典19支许愿 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 许愿</span>
                                        <span class="spec">鲜花玫瑰 80cm长形 </span><!-- 规格 -->
                                        <span class="price">￥ 2399.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/rose2.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/rose3.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/rose4.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/rose5.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/rose6.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/rose7.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/rose8.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <p class="cl"></p>
                        </ul>
                        <ul class="gem" style="display: none;"><!-- 珠宝 -->
                            <li>
                                <a href="javascript:;" title="经典-许愿">
                                    <img src="{{ asset('static/index/images/index/gem1.png') }}" alt="经典永续 - 经典19支许愿 80cm长形" title="经典永续 - 经典19支许愿 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 许愿</span>
                                        <span class="spec">鲜花玫瑰 80cm长形 </span><!-- 规格 -->
                                        <span class="price">￥ 2399.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/gem2.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/gem3.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/gem4.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/gem5.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/gem6.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/gem7.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/gem8.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <p class="cl"></p>
                        </ul>
                        <ul class="decoration" style="display: none;"><!-- 饰品 -->
                            <li>
                                <a href="javascript:;" title="经典-许愿">
                                    <img src="{{ asset('static/index/images/index/decoration1.png') }}" alt="经典永续 - 经典19支许愿 80cm长形" title="经典永续 - 经典19支许愿 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 许愿</span>
                                        <span class="spec">鲜花玫瑰 80cm长形 </span><!-- 规格 -->
                                        <span class="price">￥ 2399.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/decoration2.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/decoration3.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/decoration4.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/decoration5.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/decoration6.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/decoration7.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" title="经典-朱砂">
                                    <img src="{{ asset('static/index/images/index/decoration8.png') }}" alt="经典永续 - 经典19支朱砂 80cm长形" title="经典永续 - 经典19支朱砂 80cm长形" width="200" height="200">
                                    <div class="show">
                                        <span class="title">经典永续 朱砂</span>
                                        <span class="spec">鲜花玫瑰 80cm长形</span><!-- 规格 -->
                                        <span class="price">￥1999.0</span><!-- 价钱 -->
                                    </div>
                                </a>
                            </li>
                            <p class="cl"></p>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 分类列表 classify -->
            <div id="classify">
                <div class="classlist">
                    <h3>
                        <a href="javascript:;" class="title">鲜花玫瑰 | Fresh Cut Rose</a>
                        <a href="javascript:;" class="more">More <i><img src="{{ asset('static/index/images/comment/more.png') }}" alt=""></i></a>
                        <span class="cl" style="display: block;"></span>
                    </h3>
                    <ul>
                        <li class="left">
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/flower.jpg') }}" alt="">
                                <span></span>
                            </a>
                        </li>
                        <li class="right">
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/flower_a.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/flower_b.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/flower_c.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/flower_d.jpg') }}" alt="">
                                <span></span>
                            </a>
                        </li>
                        <p class="cl"></p>
                    </ul>
                </div>
                <div class="classlist">
                    <h3>
                        <a href="javascript:;" class="title">永生玫瑰 | Preserved Rose</a>
                        <a href="javascript:;" class="more">More <i><img src="{{ asset('static/index/images/comment/more.png') }}" alt=""></i></a>
                        <span class="cl" style="display: block;"></span>
                    </h3>
                    <ul>
                        <li class="left">
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/rose.jpg') }}" alt="">
                                <span></span>
                            </a>
                        </li>
                        <li class="right">
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/rose_a.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/rose_b.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/rose_c.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/rose_d.jpg') }}" alt="">
                                <span></span>
                            </a>
                        </li>
                        <p class="cl"></p>
                    </ul>
                </div>
                <div class="classlist">
                    <h3>
                        <a href="javascript:;" class="title">玫瑰珠宝 | Jewelry</a>
                        <a href="javascript:;" class="more">More <i><img src="{{ asset('static/index/images/comment/more.png') }}" alt=""></i></a>
                        <span class="cl" style="display: block;"></span>
                    </h3>
                    <ul>
                        <li class="left">
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/gem.jpg') }}" alt="">
                                <span></span>
                            </a>
                        </li>
                        <li class="right">
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/gem_a.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/gem_b.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/gem_c.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/gem_d.png') }}" alt="">
                                <span></span>
                            </a>
                        </li>
                        <p class="cl"></p>
                    </ul>
                </div>
                <div class="classlist">
                    <h3>
                        <a href="javascript:;" class="title">玫瑰饰品 | Accessories</a>
                        <a href="javascript:;" class="more">More <i><img src="{{ asset('static/index/images/comment/more.png') }}" alt=""></i></a>
                        <span class="cl" style="display: block;"></span>
                    </h3>
                    <ul>
                        <li class="left">
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/decoration.jpg') }}" alt="">
                                <span></span>
                            </a>
                        </li>
                        <li class="right">
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/decoration_a.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/decoration_b.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/decoration_c.jpg') }}" alt="">
                                <span></span>
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('static/index/images/index/decoration_d.jpg') }}" alt="">
                                <span></span>
                            </a>
                        </li>
                        <p class="cl"></p>
                    </ul>
                </div>
            </div>
            <!-- 分割线 -->
            <div id="line"></div>

            <!-- 专卖店 -->
            <div id="office">
                <a href="javascript:;" class="left">
                    <img src="{{ asset('static/index/images/index/office1.jpg') }}">
                    <span></span>
                </a>
                <a href="javascript:;" class="right">
                    <img src="{{ asset('static/index/images/index/office2.jpg') }}">
                    <span></span>
                </a>
                <p class="cl"></p>
            </div>
        </div>
    </article>
@endsection

@section('js')

@endsection 








