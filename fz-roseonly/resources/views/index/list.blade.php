@extends('layouts.index.masterIndex')
@section('title', '列表页')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/list.css') }}">
    <script src="{{ asset('static/index/js/list.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/index.js') }}" type="text/javascript"></script>
@endsection 


@section('content')
    <!-- 主题内容区域 -->
    <article>
        <!-- 内容 -->
        <section>
            <div class="big">
                <!-- 标题图片 -->
                <div id="image">
                    <img src="{{ asset('static/index/images/list/image.jpg') }}">
                </div>
                
                <!-- 排序 -->
                <div id="paixu">
                    <a class="first selected" href="javascript:;">综合</a>
                    <a class="first" href="javascript:;">销量</a>
                    <a class="first" href="javascript:;">最新</a>
                    <a class="first" href="javascript:;">价格</a>
                    <input type="number" name="" placeholder="¥" min="0">
                    <span>—</span>
                    <input type="number" name="" placeholder="¥" min="0">
                </div>

                <ul class="list_con" style="display: block;">
                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list1.png') }}">
                            <h3>永生玫瑰-经典永续系列</h3>
                            <p>经典许愿 单朵版 大型音乐球</p>
                            <h2>￥1999.0</h2>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list2.png') }}">
                            <h3>永生玫瑰-玫瑰公仔系列</h3>
                            <p>甜心狗嫣红 灰色端坐版(13cm) 中型公仔</p>
                            <h2>￥1520.0</h2>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list3.png') }}">
                            <h3>永生玫瑰-玫瑰公仔系列</h3>
                            <p>甜心狗嫣红 灰色端坐版 中型圆球</p>
                            <h2>￥1520.0</h2>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list4.png') }}">
                            <h3>永生玫瑰-玫瑰公仔系列</h3>
                            <p>玫瑰熊嫣红 花球版 大型圆球</p>
                            <h2>￥1520.0</h2>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list5.png') }}">
                            <h3>永生玫瑰-玫瑰公仔系列</h3>
                            <p>甜心熊嫣红 灰色站立版 中型公仔</p>
                            <h2>￥1520.0</h2>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list6.png') }}">
                            <h3>永生玫瑰-玫瑰公仔系列</h3>
                            <p>甜心熊嫣红 灰色端坐版 中型公仔</p>
                            <h2>￥1314.0</h2>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list7.png') }}">
                            <h3>永生玫瑰-玫瑰公仔系列</h3>
                            <p>玫瑰狗嫣红 定制版 30cm公仔</p>
                            <h2>￥19999.0</h2>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list8.png') }}">
                            <h3>永生玫瑰-星座经典系列</h3>
                            <p>摩羯座 单朵 Mini音乐球</p>
                            <h2>￥1520.0</h2>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list9.png') }}">
                            <h3>永生玫瑰-玫瑰公仔系列</h3>
                            <p>甜心熊嫣红 灰色站立版 中型公仔</p>
                            <h2>￥1520.0</h2>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list10.png') }}">
                            <h3>永生玫瑰-玫瑰公仔系列</h3>
                            <p>甜心熊嫣红 灰色端坐版 中型公仔</p>
                            <h2>￥1314.0</h2>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list11.png') }}">
                            <h3>永生玫瑰-玫瑰公仔系列</h3>
                            <p>玫瑰狗嫣红 定制版 30cm公仔</p>
                            <h2>￥19999.0</h2>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list12.png') }}">
                            <h3>永生玫瑰-星座经典系列</h3>
                            <p>摩羯座 单朵 Mini音乐球</p>
                            <h2>￥1520.0</h2>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <img src="{{ asset('static/index/images/list/list13.png') }}">
                            <h3>永生玫瑰-玫瑰公仔系列</h3>
                            <p>甜心熊嫣红 灰色站立版 中型公仔</p>
                            <h2>￥1520.0</h2>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="cl"></div>
            <!-- 底部 -->
            <div class="bot_list" >
                 分页
            </div>
        </section>
    </article>
@endsection

@section('js')

@endsection 

