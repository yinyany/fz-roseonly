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
                    <a class="first
                    @if($order === null)
                        selected
                    @endif
                     " href="
                    @if($type === 'null')
                        {{ url('/list',[$id]) }}
                    @elseif($type === 'type')
                        {{ url('/list',[$id,$type]) }}
                    @endif
                    ">综合</a>
                    <a class="first
                    @if($order === 'votes')
                        selected
                    @endif
                    " href="
                    @if($type === 'null')
                        {{ url('/list',[$id,'null','votes']) }}
                    @elseif($type === 'type')
                        {{ url('/list',[$id,$type,'votes']) }}
                    @endif
                    ">销量</a>
                    <a class="first
                    @if($order === 'created_at')
                        selected
                    @endif
                    " href="
                    @if($type === 'null')
                        {{ url('/list',[$id,'null','created_at']) }}
                    @elseif($type === 'type')
                        {{ url('/list',[$id,$type,'created_at']) }}
                    @endif
                    ">最新</a>
                    <a class="first
                    @if($order === 'price')
                        selected
                    @endif
                    " href="
                    @if($type === 'null')
                        {{ url('/list',[$id,'null','price']) }}
                    @elseif($type === 'type')
                        {{ url('/list',[$id,$type,'price']) }}
                    @endif
                    ">价格</a>
                   <!--  <input type="number" name="" placeholder="¥" min="0">
                    <span>—</span>
                    <input type="number" name="" placeholder="¥" min="0"> -->
                </div>

                <ul class="list_con" style="display: block;">
                    @foreach($list as $v)
                    <li>
                        <a href="{{ url('/detail',[$v->id]) }}">
                            <img src="/uploads/good/{{ $v->imgurl }}">
                            <h3>{{ $v->name }}</h3>
                            <p>{{ $v->state }} 月销量{{ $v->votes }}</p>
                            <h2>￥{{ $v->price }}</h2>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="cl"></div>
            <!-- 底部 -->
            <div class="bot_list" >
                {!! $list->render() !!}
            </div>
        </section>
    </article>
@endsection

@section('js')
    <script type="text/javascript">
        var url = window.location.href;
        // alert(url);  
        $("#paixu a").each(function () {  
            if (returnUrl($(this).attr("href")) == returnUrl(url)) {  
                console.log($(this));  
                $(this).addClass("selected").siblings().removeClass('selected');  
            }  
        });  
        //以下为截取url的方法  
        function returnUrl(href) {  
            var number = href.substring(28);  
            // alert(number);
            return href.substring(number + 1);  
        }  

    </script>
@endsection 

