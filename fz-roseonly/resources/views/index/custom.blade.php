@extends('layouts.index.masterIndex')
@section('title', '【roseonly高端定制】定制鲜花礼品_高端礼物定制_roseonly诺誓官网')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/custom.css') }}">
@endsection 


@section('content')
    <!-- 主题内容区域 -->
    <article>
        <div id="content">
            <!-- banner -->
            <div id="banner1"><img src="{{ asset('static/index/images/custom/banner1.jpg') }}" alt=""></div>

            <!-- 规格分类 sepc-->
            <ul id="sepc">
                <li>
                    <a href="javascript:;">
                        <img src="{{ asset('static/index/images/custom/sepc1.jpg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="{{ asset('static/index/images/custom/sepc2.jpg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="{{ asset('static/index/images/custom/sepc3.jpg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="{{ asset('static/index/images/custom/sepc4.jpg') }}" alt="">
                    </a>
                </li>
                <p class="cl"></p>
            </ul>

            <!-- 玫瑰分类 rose_spec -->
            <div id="rose_sepc">
                <img src="{{ asset('static/index/images/custom/rose.jpg') }}" alt="" class="big">
                <div class="small">
                    <a href="javascript:;"><img src="{{ asset('static/index/images/custom/rose1.jpg') }}" alt=""></a>
                    <a href="javascript:;"><img src="{{ asset('static/index/images/custom/rose2.jpg') }}" alt=""></a>
                    <a href="javascript:;"><img src="{{ asset('static/index/images/custom/rose3.jpg') }}" alt=""></a>
                </div>
                <p class="cl"></p>
            </div>

            <!-- banner -->
            <div id="banner2"><img src="{{ asset('static/index/images/custom/banner2.jpg') }}" alt=""></div>

            <!-- 描述 desc -->
            <div id="desc">
                <a href="javascript:;">
                    <img src="{{ asset('static/index/images/custom/desc1.jpg') }}" alt="">
                    <img src="{{ asset('static/index/images/custom/desc2.jpg') }}" alt="">
                    <img src="{{ asset('static/index/images/custom/desc3.jpg') }}" alt="">
                    <img src="{{ asset('static/index/images/custom/notice.jpg') }}" alt=""><!--须知-->
                </a>
            </div>
        </div>
    </article>
@endsection

@section('js')

@endsection 

