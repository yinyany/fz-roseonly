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
                    <li class="flower">
                        <a href="javascript:;">鲜花玫瑰</a>
                        <div class="next">
                            <div class="child">
                                <div class="column1">
                                    <b>类型</b>
                                    <a href="javascript:;">玫瑰长盒</a>
                                    <a href="javascript:;">玫瑰手捧</a>
                                    <a href="javascript:;">玫瑰花篮</a>
                                    <a href="javascript:;">玫瑰水晶花盒</a>
                                </div>
                                <div class="column2">
                                    <b>系列</b>
                                    <a href="javascript:;">经典永续</a>
                                    <a href="javascript:;">恒久真爱</a>
                                    <a href="javascript:;">爱在满怀</a>
                                    <a href="javascript:;">星座经典</a>
                                    <a href="javascript:;">for all love</a>
                                </div>
                                <div class="column3">
                                    <b>规格</b>
                                    <a href="javascript:;">19支80cm</a>
                                    <a href="javascript:;">11支80cm</a>
                                    <a href="javascript:;">19支40cm</a>
                                    <a href="javascript:;">11支40cm</a>
                                </div>
                                <a href=""><img src="{{ asset('static/index/images/comment/flower.jpg') }}" alt=""></a>
                                <p class="cl"></p>
                            </div>
                        </div>
                    </li>
                    <li class="rose">
                        <a href="javascript:;">永生玫瑰</a>
                        <div class="next">
                            <div class="child">
                                <div class="column1">
                                    <b>类型</b>
                                    <a href="javascript:;">音乐玫瑰</a>
                                    <a href="javascript:;">玫瑰球形</a>
                                    <a href="javascript:;">玫瑰圆盒</a>
                                    <a href="javascript:;">玫瑰方盒</a>
                                    <a href="javascript:;">玫瑰心形盒</a>
                                </div>
                                <div class="column2">
                                    <b>系列</b>
                                    <a href="javascript:;">玫瑰熊</a>
                                    <a href="javascript:;">全世爱</a>
                                    <a href="javascript:;">经典永续</a>
                                    <a href="javascript:;">星座经典</a>
                                    <a href="javascript:;">一生一世</a>
                                    <a href="javascript:;">for all love</a>
                                </div>
                                <div class="column3">
                                    <b>规格</b>
                                    <a href="javascript:;">巨型</a>
                                    <a href="javascript:;">大型</a>
                                    <a href="javascript:;">中型</a>
                                    <a href="javascript:;">小型</a>
                                    <a href="javascript:;">Mini</a>
                                </div>
                                <a href=""><img src="{{ asset('static/index/images/comment/rose.jpg') }}" alt=""></a>
                                <p class="cl"></p>
                            </div>
                        </div>
                    </li>
                    <li class="jewel">
                        <a href="javascript:;">玫瑰珠宝</a>
                        <div class="next">
                            <div class="child">
                                <div class="column1">
                                    <b>类型</b>
                                    <a href="javascript:;">项链</a>
                                    <a href="javascript:;">手链</a>
                                    <a href="javascript:;">耳饰</a>
                                    <a href="javascript:;">手镯</a>
                                    <a href="javascript:;">戒指</a>
                                </div>
                                <div class="column2">
                                    <b>系列</b>
                                    <a href="javascript:;">玫瑰熊</a>
                                    <a href="javascript:;">生辰石</a>
                                    <a href="javascript:;">玫瑰经典</a>
                                    <a href="javascript:;">经典永续</a>
                                    <a href="javascript:;">星座经典</a>
                                    <a href="javascript:;">全心全意</a>
                                    <a href="javascript:;">幸运精灵</a>
                                </div>
                                <div class="column3">
                                    <b>材质</b>
                                    <a href="javascript:;">18K玫瑰金镶钻</a>
                                    <a href="javascript:;">18K白金镶钻</a>
                                    <a href="javascript:;">18K玫瑰金</a>
                                    <a href="javascript:;">18K白金</a>
                                    <a href="javascript:;">9K玫瑰金</a>
                                </div>
                                <a href=""><img src="{{ asset('static/index/images/comment/jewel.jpg') }}" alt=""></a>
                                <p class="cl"></p>
                            </div>
                        </div>
                    </li>
                    <li class="ornaments">
                        <a href="javascript:;">玫瑰饰品</a>
                        <div class="next">
                            <div class="child">
                                <div class="column1">
                                    <b>类型</b>
                                    <a href="javascript:;">项链</a>
                                    <a href="javascript:;">手链</a>
                                    <a href="javascript:;">耳饰</a>
                                    <a href="javascript:;">手镯</a>
                                    <a href="javascript:;">戒指</a>
                                </div>
                                <div class="column2">
                                    <b>系列</b>
                                    <a href="javascript:;">玫瑰经典</a>
                                    <a href="javascript:;">星座经典</a>
                                    <a href="javascript:;">时光之吻</a>
                                    <a href="javascript:;">全心全意</a>
                                    <a href="javascript:;">情有独钟</a>
                                    <a href="javascript:;">幸运精灵</a>
                                    <a href="javascript:;">经典永续</a>
                                </div>
                                <div class="column3">
                                    <b>材质</b>
                                    <a href="javascript:;">925银镀玫瑰金</a>
                                    <a href="javascript:;">925银镀白金</a>
                                    <a href="javascript:;">925银珍珠</a>
                                </div>
                                <a href=""><img src="{{ asset('static/index/images/comment/ronaments.jpg') }}" alt=""></a>
                                <p class="cl"></p>
                            </div>
                        </div>
                    </li>
                    <li><a href="javascript:;">高端定制</a></li>
                    <li><a href="javascript:;">专卖店</a></li>
                    <li class="oath">
                        <a href="javascript:;">诺誓世界</a>
                        <div class="next">
                            <div class="child">
                                <div class="column1">
                                    <b>品牌介绍</b>
                                    <a href="javascript:;">品牌故事</a>
                                    <a href="javascript:;">产品故事</a>
                                    <a href="javascript:;">明星时刻</a>
                                    <a href="javascript:;">真爱见证</a>
                                    <a href="javascript:;">活动资讯</a>
                                    <a href="javascript:;">诺誓百科</a>
                                </div>
                                <div class="column2">
                                    <b>节日百科</b>
                                    <a href="javascript:;">情人节百科</a>
                                    <a href="javascript:;">母亲节百科</a>
                                    <a href="javascript:;">520百科</a>
                                    <a href="javascript:;">七夕节百科</a>
                                    <a href="javascript:;">圣诞节百科</a>
                                </div>
                                <a href=""><img src="{{ asset('static/index/images/comment/oath.png') }}" alt=""></a>
                                <p class="cl"></p>
                            </div>
                        </div>
                    </li>
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