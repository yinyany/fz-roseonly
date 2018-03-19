<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>roseonly - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/comment.css') }}">

    <script src="{{ asset('static/index/js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/comment.js') }}" type="text/javascript"></script>

    @section('link')
        {{-- 此区块继承加载其他外部引入文件 --}} 
    @show

</head>
<body>
    <header>
        <!-- ++++++++++ 顶部链接条 +++++++++++ -->
        <div id="head">
            <div class="head">
                <!-- ++++++++++ 左边两个logo图标+链接 +++++++++++ -->
                <div class="head_left">
                    <a href="javascript:;" class="roseonly onHead"></a>
                    <a href="javascript:;" class="loveroseonly"></a>
                </div>
                <!-- ++++++++++ 右边登录、注册、购物袋 +++++++++++ -->
                <div class="head_right">
                    @if(session('usersInfo') != null)
                        <a href="{{ url('/member',[session('usersInfo')['id']]) }}" class="login">{{ session('usersInfo')['name'] }}</a>
                        <span>|</span>
                        <a href="{{ url('/authindex/logout') }}" class="register">退出</a>
                        <span>|</span>
                    @elseif(session('usersInfo') == null)
                        <a href="{{ url('/authindex/login') }}" class="login">登录</a>
                        <span>|</span>
                        <a href="{{ url('/authindex/register') }}" class="register">注册</a>
                        <span>|</span>
                    @endif
                    <a href="javascript:;" class="shopCar"></a>
                    <span id="shopNum">(0)</span>
                </div>
            </div>
        </div>
        <!-- ++++++++++ logo +++++++++++ -->
        <div id="logo">
            <a href="index.html">
                <img src="{{ asset('static/index/images/comment/logo.jpg') }}" alt="roseonly官网" title="roseonly官网">
            </a>
        </div>
        <!-- ++++++++++ 导航条 +++++++++++ -->
        <div id="nav">
            <ul>
                <div class="list">
                    <div style="display: none;width:120px;height:30px;float: left;" class="logo">
                        <a href="javascript:;">
                            <img src="{{ asset('static/index/images/comment/head_roseonly_hover.png') }}" height="34" style="padding-top:3px;">
                        </a>
                    </div>
                    <li class="gift">
                        <a href="javascript:;">爱礼推荐</a>
                        <div class="next">
                            <div class="child">
                                <div class="column1">
                                    <b>场合</b>
                                    <a href="javascript:;">生日</a>
                                    <a href="javascript:;">纪念日</a>
                                    <a href="javascript:;">表白</a>
                                    <a href="javascript:;">求婚</a>
                                    <a href="javascript:;">重要的人</a>
                                    <a href="javascript:;">道歉</a>
                                </div>
                                <div class="column2">
                                    <b>人群</b>
                                    <a href="javascript:;">送给她</a>
                                    <a href="javascript:;">送给他</a>
                                    <a href="javascript:;">送母亲</a>
                                    <a href="javascript:;">送父亲</a>
                                </div>
                                <div class="column3">
                                    <b>品类</b>
                                    <a href="javascript:;">鲜花玫瑰</a>
                                    <a href="javascript:;">永生玫瑰</a>
                                    <a href="javascript:;">玫瑰珠宝</a>
                                    <a href="javascript:;">玫瑰饰品</a>
                                    <a href="javascript:;">玫瑰礼品</a>
                                </div>
                                <a href=""><img src="{{ asset('static/index/images/comment/gift.jpg') }}" alt=""></a>
                                <p class="cl"></p>
                            </div>
                        </div>
                    </li>
                    @foreach($array as $list)
                    <li class="flower">
                        <a href="javascript:;">{{ $list['name'] }}</a>
                        <div class="next">
                            <div class="child">
                                @foreach($list['children'] as $value)
                                <div class="column1" style="border-right: 1px solid #414141;">
                                    <b>{{ $value['name'] }}</b>
                                    @foreach($value['children'] as $v)
                                    <a href="javascript:;">{{ $v['name'] }}</a>
                                    @endforeach
                                </div>
                                @endforeach
                                <a href=""><img src="{{ asset('static/index/images/comment/flower.jpg') }}" alt=""></a>
                                <p class="cl"></p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    <!-- ++++++++++ 右边登录、注册、购物袋 +++++++++++ -->
                    <div class="head_right" style="display: none;">
                    <a href="javascript:;" class="login">登录</a>
                    <span>|</span>
                    <a href="javascript:;" class="register">注册</a>
                    <span>|</span>
                    <a href="javascript:;" class="shopCar" style="background:url({{ asset('static/index/images/comment/shopCarNav.png)no-repeat scroll center center;') }}"></a>
                    <span id="shopNum">(0)</span>
                   <!--  <input type="text" placeholder="输入信息">  -->
                    </div>
                    <div class="cl"></div>
                </div>
            </ul>
        </div>
        <div class="cl"></div>
    </header>

    <!-- 主题内容区域 -->
    @section('content')
        {{-- 此区块继承加载页面主体 --}}    
    @show

    <footer>
        <ul id="footNav">
            <li class="free">
                <span>
                    <i>全场包邮</i>
                    <b>特殊礼品除外</b>
                </span>
            </li>
            <li class="express">
                <span>
                    <i>同城速递</i>
                    <b>支持当日送达</b>
                </span>
            </li>
            <li class="message">
                <span>
                    <i>爱的留言</i>
                    <b>支持语音与文字，可随时查阅</b>
                </span>
            </li>
            <li class="Khaled">
                <span>
                    <i>保养物语</i>
                    <b>悉心保养，恒久保存爱意</b>
                </span>
            </li>
            <div class="cl"></div>
        </ul>
        <div id="footer">
            <div class="left">
                <a href="javascript:;"><img src="{{ asset('static/index/images/comment/footer_logo.png') }}" alt=""></a>
                <p>
                    <span>关注我们</span>
                    <a class="weixin">
                        <img src="{{ asset('static/index/images/comment/weixin.png') }}" class="small">
                    </a>
                    <a href="javascript:;" class="weibo"><img src="{{ asset('static/index/images/comment/weibo.png') }}"></a>
                </p>
            </div>
            <div class="list">
                <p>
                    <b>新手指南</b>
                    <a href="javascript:;">购物流程</a>
                    <a href="javascript:;">支付方式</a>
                    <a href="javascript:;">常见问题</a>
                    <a href="javascript:;">指圈测量</a>
                </p>
                <p>
                    <b>售后服务</b>
                    <a href="javascript:;">退款说明</a>
                    <a href="javascript:;">保养物语</a>
                </p>
                <p>
                    <b>物流配送</b>
                    <a href="javascript:;">配送方式</a>
                    <a href="javascript:;">配送服务</a>
                </p>
                <p>
                    <b>关于我们</b>
                    <a href="javascript:;">品牌介绍</a>
                    <a href="javascript:;">销售渠道</a>
                    <a href="javascript:;">联系我们</a>
                    <a href="javascript:;">加入我们</a>
                </p>
            </div>
            <div class="right">
                <p>
                    <img src="{{ asset('static/index/images/comment/weixinerweima.png') }}" alt="" width="120">
                    <span>微信关注roseonly</span>
                </p>
                <p>
                    <img src="{{ asset('static/index/images/comment/website.png') }}" alt="" width="120">
                    <span>roseonly官网</span>
                </p>
            </div>
        </div>
        <div id="footInfo">京ICP备13007738号 京公网安备11010502023922 www.roseonly.com.cn；诺誓（北京）商业股份有限公司</div>
    </footer>
    <!-- 侧边栏 -->
    <div id="side">
        <div class="erweima block">
            <img src="{{ asset('static/index/images/comment/erweima.png') }}" width="25">
            <p><img src="{{ asset('static/index/images/comment/link_weixin.png') }}" alt=""></p>
        </div>
        <div class="service block">
            <img src="{{ asset('static/index/images/comment/service.png') }}" width="25">
            <p>
                <span class="txt">联系电话</span>
                <span class="phone">400-1314-520</span>
                <span class="line"></span>
                <a href="javascript:;" class="btn">在线客服</a>
            </p>
        </div>
        <div class="top block" style="display: none;"><a href="#"><img src="{{ asset('static/index/images/comment/top.png') }}" width="21"></a></div>
    </div>
    <!-- 微信二维码居中弹框 -->
    <div id="rose-big"><img src="{{ asset('static/index/images/comment/QR-big.jpg') }}" alt="扫描二维码" class="big"></div>

    @section('js')
        {{-- 此区块继承加载js文件 --}}    
    @show
</body>
</html>