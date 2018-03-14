@extends('layouts.index.masterIndex')
@section('title', '个人中心')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/shopcar.css') }}">
    <script src="{{ asset('static/index/js/area.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/shopcar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/index.js') }}" type="text/javascript"></script>
@endsection 


@section('content')
    <!-- 主题内容区域 -->
    <article>
        <div id="conter">
            <div class="conter_line"></div>
            <div class="order catbox">
                <div class="shopping">
                    <div class="shop-left">我的购物车</div>
                        
                </div>
                <!-- 表格 -->
                <table id="cartTable" >
                    <thead>
                        <tr>
                            <th >
                                <label>
                                <input class="check-all check" type="checkbox">&nbsp;&nbsp;全选</label></th>
                            <th >商品</th>
                            <th >单价</th>
                            
                            <th >数量</th>
                            <th >小计</th>
                            <th >操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="on">
                            <td class="checkbox">
                                <input class="check-one check" type="checkbox">
                            </td>
                            <td class="goods">
                                <img src="{{ asset('static/index/images/shopcar/tut.png') }}" alt="">
                                <span>一生一世-嫣红-盛开版-中型方形</span>
                            </td>
                            <td class="price">5999.88</td>
                            <td class="count">
                                <span class="reduce"></span>
                                <input class="count-input" type="text" value="1">
                                <span class="add">+</span></td>
                            <td class="subtotal">5999.88</td>
                            <td class="operation"><span class="delete">删除</span></td>
                        </tr>
                        <tr class="on">
                            <td class="checkbox">
                                <input class="check-one check" type="checkbox">
                            </td>
                            <td class="goods">
                                <img src="{{ asset('static/index/images/shopcar/decoration3.png') }}" alt="">
                                <span>经典永续-时光之吻-925银玫瑰色-中型手镯</span></td>
                            <td class="price">3888.50</td>
                            <td class="count"><span class="reduce"></span>
                                <input class="count-input" type="text" value="1">
                                <span class="add">+</span></td>
                            <td class="subtotal">3888.50</td>
                            <td class="operation"><span class="delete">删除</span></td>
                        </tr>
                        <tr class="on">
                            <td class="checkbox">
                                <input class="check-one check" type="checkbox">
                            </td>
                            <td class="goods">
                                <img src="{{ asset('static/index/images/index/decoration4.png') }}" alt="">
                                <span>玫瑰公仔-甜心狗-18K双色金-手链</span>
                            </td>
                            <td class="price">1428.50</td>
                            <td class="count">
                                <span class="reduce"></span>
                                <input class="count-input" type="text" value="1">
                                <span class="add">+</span></td>
                            <td class="subtotal">1428.50</td>
                            <td class="operation"><span class="delete">删除</span></td>
                        </tr>
                        <tr class="on">
                            <td class="checkbox">
                                <input class="check-one check" type="checkbox">
                            </td>
                            <td class="goods">
                                <img src="{{ asset('static/index/images/index/decoration5.png') }}" alt="">
                                <span>玫瑰公仔-甜心狗-18K双色金-手链</span></td>
                            <td class="price">640.60</td>
                            <td class="count"><span class="reduce"></span>
                                <input class="count-input" type="text" value="1">
                                <span class="add">+</span></td>
                            <td class="subtotal">640.60</td>
                            <td class="operation"><span class="delete">删除</span></td>
                        </tr>

                    </tbody>
                </table>
                <!-- ++++++++++ 结算+++++++++++ -->

                <div class="foot" id="foot">
                    <label class="fl select-all">
                        <input type="checkbox" class="check-all check">&nbsp;&nbsp;全选
                    </label>
                    <a class="fl delete" id="deleteAll" href="javascript:;">删除</a>
                    <div class="fr closing" onclick="getTotal();">结 算</div>
                    <input type="hidden" id="cartTotalPrice">
                    <div class="fr total">
                        合计：￥
                        <span id="priceTotal">11957.48</span>
                    </div>
                    <div class="fr selected" id="selected">
                        已选商品
                        <span id="selectedTotal">4</span>
                        件<span class="arrow up">︽</span>
                        <span class="arrow down">︾</span>
                    </div>
                    <div class="selected-view">
                        <div id="selectedViewList" class="clearfix"><div>
                            <img src="http://www.jq22.com/demo/jquery-guc20151105/images/1.jpg">
                            <span class="del" index="0">取消选择</span>
                        </div>
                        <div>
                            <img src="http://www.jq22.com/demo/jquery-guc20151105/images/2.jpg">
                            <span class="del" index="1">取消选择</span>
                        </div>
                        <div>
                            <img src="http://www.jq22.com/demo/jquery-guc20151105/images/3.jpg">
                            <span class="del" index="2">取消选择</span>
                        </div>
                        <div>
                            <img src="http://www.jq22.com/demo/jquery-guc20151105/images/4.jpg">
                            <span class="del" index="3">取消选择</span>
                        </div>
                    </div>
                        <span class="arrow">◆<span>◆</span></span> 

                    </div>
                </div>
                <!-- ++++++++++++ 订单帮助++++++++++++++ -->
                <div class="shoping_help">
                    <p class="help_a">订单帮助</p>
                    <p class="help_b">热线电话：400-1314-520</p>
                    <p class="help_c">客服邮箱：<a href="mailto:service@roseonly.com">service@roseonly.com</a>&nbsp;&nbsp;客服工作时间：周一至周日9:00-21:00</p>
                    <p class="help_b">如果您在下单过程中遇到问题，请与我们联系。因为鲜花商品对配送时效有特殊要求，订购后请随时登录查询物流状态。</p> 
                </div>
            </div>
            <div class="shopcar_botm_line"></div> 
        </div>
    </article>
@endsection

@section('js')

@endsection 

