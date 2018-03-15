@extends('layouts.index.masterIndex')
@section('title', '个人中心')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/person.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/css/city.css') }}">
    <script src="{{ asset('static/index/js/person.js" type="text/javascript') }}"></script>
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
                <nav>
                    <a href="javascript:;" class="nav_hover">我的订单</a>
       
                    <a href="javascript:;">我的信息</a>
                    <a href="javascript:;">收货地址</a>
                </nav>
                <div class="order_con">
                    <!-- 我的订单信息 -->
                   
                    <div class="sec1 sec">
                        <!-- 订单标号内容 -->
                        <div class="con_r">
                            <ul class="con_ra">
                                <li>
                                    <div>
                                        <span class="center-a">订单编号：</span>
                                        <span class="center-b">2018030617255527</span> 
                                    </div>
                                   
                                </li>
                                <li>
                                    <div>
                                        <span class="center-a">支付方式：</span>
                                        <span class="center-b">在线支付</span>      
                                    </div>
                                   
                                </li>
                                <li>
                                    <div>
                                         <span class="center-a">订单状态：</span>
                                         <span class="center-b"> 等待付款</span>
                                    </div>
                                  
                                </li>
                                <li>
                                    <div>
                                         <span class="center-a">消费时间：</span>
                                         <span class="center-b" >2018-03-06 17:25</span>
                                    </div>
                                  
                                </li>
                                <li>
                                    <div>
                                        <span class="center-a">订单金额：</span>
                                        <span class="center-b">
                                        ￥<label id="jep618650" class="jep">3999.0</label>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="center-all">
                                        <span class="center-a">订单操作：</span>
                                        <span class="center-c"> 等待付款</span>
                                       <a href="">取消订单</a>
                                    </div>
                                   
                                </li>
                            </ul>
                            <div class="con_bom">
                                 <img src="{{ asset('static/index/images/index/decoration1.png') }}" alt="" >
                                 <div class="cona_left">
                                     <ul>
                                         <li>
                                            <span class="center-q">商品名称:</span>
                                             <span class="center-w">项圈狗-18K双色金-项链</span>
                                         </li>
                                          <li>
                                             <span class="center-q">单价:</span>
                                             <span class="center-w">
                                            ￥<label >3999.0</label>
                                            </span>
                                         </li>
                                          <li>
                                              <span class="center-q">商品数量:</span>
                                             <span class="center-w">1</span>
                                         </li>
                                         <li>
                                              <span class="center-q">物流状态:</span>
                                             <span class="center-w">未发货</span>
                                         </li>
                                         <li>
                                              <span class="center-q">物流单号:</span>
                                             <span class="center-w"></span>
                                         </li>
                                         <li>
                                            <div class="cona_botto">
                                               <span class="center-q">配送操作:</span>
                                               <div class="coma_rightb">
                                                    <a href="" style=" color:#60a0e1;">【查看】</a>
                                                    <a href="" style=" color:#60a0e1;">【修改信息】</a>
                                               </div>
                                               
                                            </div>
                                              
                                         </li>
                                     </ul>
                                 </div>
                            </div>
                        </div>
                        <!-- 结束订单标号内容 -->

                    </div>
                   
                   
                    <!-- 基本信息 -->
                    <div class="sec4 sec hide">
                        <h3>
                            <a href="javascript:;" class="person_hover">基本信息</a>
                            <a href="javascript:;">修改密码</a>
                        </h3>
                        <div class="sec3" class="selected1">
                            <form action="" method="get">
                                <table id="person_info">
                                    <colgroup>
                                        <col width="120">
                                        <col width="182">
                                        <col width="160">
                                        <col width="240">
                                        <col width="232">
                                    </colgroup>
                                     <tr>
                                        <td>
                                            <img src="{{ asset('static/index/images/details/img1.jpg') }}" width="60px" height="60px">
                                            <span style="color:red;margin-left:30px;">Andy</span>
                                        </td>
                                        <td></td>
                                        
                                        <td>昵称</td>
                                        <td><input type="text" maxlength=15 class="text"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>

                                        <td>爱人名字</td>
                                        <td><input type="text" name="love" value="畅甜莉" maxlength=15 class="text"></td>
                                        <td>昵称</td>
                                        <td><input type="text" maxlength=15 class="text"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>爱人手机</td>
                                        <td><input type="text" name="love" value="" maxlength=15 class="text"></td>
                                        <td>手机</td>
                                        <td><input type="text" name="love" value="" maxlength=15 class="text"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>生日</td>
                                        <td><input type="text" name="love" value="" maxlength=15 class="text"></td>
                                       
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>情感状态</td>
                                        <td>
                                            <select name="marriage" id="marriage">
                                                <option value="" selected>关系</option>
                                                <option value="">未婚</option>
                                                <option value="">订婚</option>
                                                <option value="">已婚</option>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>性别</td>
                                        <td>
                                            <input type="radio" name="sex" value='男' class="sex" checked> 男 &nbsp;&nbsp;
                                            <input type="radio" name="sex" value='女' class="sex"> 女
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr id="select_city">
                                        <td></td>
                                        <td></td>
                                        <td>居住地</td>
                                        <td>
                                            <select name="s_province" id="s_province"></select>
                                            <select name="s_city" id="s_city"></select>
                                            <select id="s_county" name="s_county"></select>
                                            <script class="resources library" src="{{ asset('static/index/js/area.js') }}" type="text/javascript"></script>
                                            <script type="text/javascript">_init_area();</script>
                                            <div id="show"></div>
                                        </td>
                                        <td>
                                            <input type="text" name="det_address" id="det_address" placeholder="请输入详细的地址" maxlength="200" style="display: block;width:230px;height: 30px;border:1px solid #83847e;color:#83847e;">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <script type="text/javascript">
                                        var Gid  = document.getElementById ;
                                        var showArea = function(){
                                            Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +  
                                            Gid('s_city').value + " - 县/区" + 
                                            Gid('s_county').value + "</h3>"
                                                                    }
                                        // Gid('s_county').setAttribute('onchange','showArea()');
                                    </script>
                                    
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>邮箱</td>
                                        <td><input type="text" name="email" class="text"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                  
                                </table>
                                <div class="person_btn" style="text-align: center;">
                                    <input type="image" name="" src="{{ asset('static/index/images/comment/pf.gif') }}">
                                    <strong style="display: block;clear:both;"></strong>
                                </div>

                            </form>
                        </div>
                        <div class="sec3"  style="display:none;">
                            <form action="" method="get">
                                <table id="person_pass">
                                    <colgroup>
                                        <col width="200">
                                        <col width="182">
                                        <col width="160">
                                        <col width="180">
                                        <col width="180">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td><span style="color:red;width:5px;height: 5px;float: right">＊</span>旧 密 码</td>
                                            <td><input type="text" name="oldpass" value="" maxlength=15 class="text"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><span style="color:red;width:5px;height: 5px;float: right">＊</span>新 密 码</td>
                                            <td><input type="text" name="newpass" value="" maxlength=15 class="text"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><span style="color:red;width:5px;height: 5px;float: right">＊</span>确认新密码</td>
                                            <td><input type="text" name="newpass" value="" maxlength=15 class="text"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="image" name="" src="{{ asset('static/index/images/comment/pe.gif') }}" style="margin-left:">
                                                <strong style="display: block;clear:both;"></strong>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <!-- 地址 -->
                    <div class="sec8 sec hide">
                        <div class="card_money">
                            收获地址管理 
                        </div>
                        <div class="smod_addres">
                            <p>常<br>用<br>地<br>址<br></p>
                            <div class="nickname">
                                <span >niu<em>收</em></span>
                                 <span >
                                     <strong>山西省</strong><strong>运城市</strong><strong>盐湖区</strong><em style="font-style:normal">盐湖区</em>
                                 </span>
                                 <span class="mobilenumber">
                                     15234375791
                                </span>
                                
                            </div>
                            <div class="opera">
                            <!--如果这里出现2操作就在第一个上面加oneMore,出现3个的加More-->
                            <a href="javascript:;" onclick="popWinAddressDivEdit('221270','niu',
                                '6','128','1163','盐湖区','15234375791','','1','044000');" class="black oneMore">编辑</a>
                            </div>
                        </div>
                        <div class="new_addres">
                            <a href="javascript:;" onclick="" class="add_address">
                            添加新地址
                             </a>   
                        </div>
                         <div id="add" >
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td class="one">
                                            
                                            收 货 人 :&nbsp;&nbsp;
                                        </td>
                                        <td class="two">
                                            <input type="text" name="" style="width:200px;height:30px;">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="one">
                                           
                                            手机号码 :&nbsp;&nbsp;
                                        </td>
                                        <td class="two">
                                            <input type="text" name="" style="width:200px;height:30px;">
                                        </td>
                                        <td></td>
                                    </tr>   
                                </table>
                                <div id="content-wrap">     
                                    <div id="content-left" class="demo">
                                        <form action="" name="form1">

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
                                                       
                                                        地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址 :&nbsp;&nbsp; 
                                                    </td>
                                                    <td class="two">
                                                        <input class="dizhi" type="text" name="" style="width:200px;height:30px;">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="one">
                                                       
                                                        邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编 :&nbsp;&nbsp; 
                                                    </td>
                                                    <td class="two">
                                                        <input type="text" name="" style="width:200px;height:30px;"> 
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </form> 
                                    </div>
                                   

                                <div class="save_sumbmit">
                                    <input type="submit" value="保存"style="width:100px;height:30px;">
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- 添加显示与隐藏 -->
                    <script type="text/javascript">
                      window.onload = function(){
                        var btn = document.getElementsByClassName('add_address')[0];
                        var divEle = document.getElementById('add');
                        btn.onclick = function(){
                           if(divEle.style.display == 'block'){
                              divEle.style.display = 'none';
                              btn.innerHTML = '添加新地址';
                              btn.style="color:#333";

                           }else{
                              divEle.style.display = 'block';
                              btn.innerHTML = '取消';
                              btn.style="color:red";
                           } 
                          
                        }
                      }
                    </script>
                    
                </div>
            </div>
        </div>
    </article>
@endsection

@section('js')

@endsection 
