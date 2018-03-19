@extends('layouts.index.masterIndex')
@section('title', '【roseonly高端定制】定制鲜花礼品_高端礼物定制_roseonly诺誓官网')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/index/css/detail.css') }}">
    <script src="{{ asset('static/index/js/detail.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/index/js/detail2.js') }}" type="text/javascript"></script>
@endsection 


@section('content')
    <!-- 主题内容区域 -->
    <article>
        <div id="content">
            <div id="fadeDiv">
                <div class="fadeDiv">
                    <div class="fadeLeft">
                        <ul>
                            <li style="display: block;"><img src="{{ asset('static/index/images/details/opt_big1.png') }}" alt="玫瑰熊-嫣红" width="350" height="350" title="玫瑰熊-嫣红"></li>
                            <li><img src="{{ asset('static/index/images/details/opt_big2.png') }}" alt="玫瑰熊-嫣红" width="350" height="350" title="玫瑰熊-嫣红"></li>
                            <li><img src="{{ asset('static/index/images/details/opt_big3.png') }}" alt="玫瑰熊-嫣红" width="350" height="350" title="玫瑰熊-嫣红"></li>
                            <li><img src="{{ asset('static/index/images/details/opt_big4.png') }}" alt="玫瑰熊-嫣红" width="350" height="350" title="玫瑰熊-嫣红"></li>
                            <li><img src="{{ asset('static/index/images/details/opt_big4.png') }}" alt="玫瑰熊-嫣红" width="350" height="350" title="玫瑰熊-嫣红"></li>                              
                        </ul>
                        <ol>
                             <li class="selected"><img src="{{ asset('static/index/images/details/opt_sma1.png') }}" width="55" height="55"></li>
                             <li><img src="{{ asset('static/index/images/details/opt_sma2.png') }}" width="55" height="55"></li>
                             <li><img src="{{ asset('static/index/images/details/opt_sma3.png') }}" width="55" height="55"></li>
                             <li><img src="{{ asset('static/index/images/details/opt_sma4.png') }}" width="55" height="55"></li>
                             <li><img src="{{ asset('static/index/images/details/opt_sma4.png') }}" width="55" height="55"></li>
                        </ol>
                    </div> 
                    <div class="pro_det">
                        <p>经典永续-经典19支许愿 80cm长形</p>
                        <p>1021010014</p>
                        <div class="price">
                             <p class="font">价格：</p>
                             <p>¥2399.0</p>
                             <strong style="display: block;clear:both;"></strong>   
                        </div>
                        <div class="color">
                            <p class="font">颜色：</p>
                            <p class="color_img">
                                <a href=""><img src="{{ asset('static/index/images/details/opt_sma1.png') }}" alt=""></a>
                                <strong style="display: block;clear:both;"></strong> 
                            </p>
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
                                <strong style="display: block;clear:both;"></strong>
                            </div>
                        </div>
                        <div class="buy">
                            <p class="immediately"><a href="">立即购买</a></p>
                            <p class="join"><a href="">加入购物车</a></p>
                            <strong style="display: block;clear:both;"></strong>
                        </div>
                        <p class="service">服务承诺：官方正品 免费配送 同城速递</p>
                        <strong style="display: block;clear:both;"></strong>
                    </div> 
                    <strong style="display: block;clear:both;"></strong>    
                </div>
            </div>

            <div id="param">
                <h3>产品参数</h3>
                <table>
                    <col>
                    <col>
                    <col width="180">
                    <col>
                    <col>
                    <tr>
                        <td><b>•适用场景：</b></td>
                        <td>求婚、纪念日</td>
                        <td></td>
                        <td><b>•鲜花朵数：</b></td>
                        <td>19支</td>
                    </tr>
                    <tr>
                        <td><b>•适用对象：</b></td>
                        <td>女朋友</td>
                        <td></td>
                        <td><b>•颜色分类：</b></td>
                        <td>许愿</td>
                    </tr>
                    <tr>
                        <td><b>•适用节日：</b></td>
                        <td>情人节、520表白日、七夕节</td>
                        <td></td>
                        <td><b>•产品规格：</b></td>
                        <td>81*21*13cm</td>
                    </tr>
                </table>
                <strong style="display: block;clear:both;"></strong>
            </div>

            <div id="detail">
                <img src="{{ asset('static/index/images/details/xq_08.png') }}">
                <h2 class="title"><span style="color: red;">商品详情</span><span>买家评论</span></h2>
                <div class="cont">
                    <div calss="img" style="display: block">
                        <img src="{{ asset('static/index/images/details/15.jpg') }}" alt="颜色">
                        <img src="{{ asset('static/index/images/details/4.jpg') }}" alt="颜色">
                        <img src="{{ asset('static/index/images/details/5.jpg') }}" alt="颜色">
                        <img src="{{ asset('static/index/images/details/6.jpg') }}" alt="颜色">
                        <img src="{{ asset('static/index/images/details/7.jpg') }}" alt="颜色">
                        <img src="{{ asset('static/index/images/details/16.jpg') }}" alt="颜色">
                        <strong style="display: block;clear: both;"></strong>
                    </div>
                    <div class="comment">
                        <ul id="pn">
                            <li class="list0">
                                <a class="close" href="javascript:;">X</a>
                                <div class="head"><img src="{{ asset('static/index/images/details/img1.jpg') }}" width="60px" height="60px"> </div>
                               
                                  
                                <div class="content">
                                    <p class="text">
                                      <span class="name">Andy：</span>
                                      哈哈哈哈哈谁还没个妈～//@我的朋友是个呆B: 饮水机那个蕾丝罩我给跪了//@八卦_我实在是太CJ了:仿佛看到了自己家
                                    </p> 
                                    <div class="pic">
                                        <img src="{{ asset('static/index/images/details/opt_sma1.png') }}" width="30px" height="30px">
                                    
                                    </div>
                                    
                               
                                <div class="good">
                                    <span class="date">02-14 23:01</span>
                                    <a class="dzan" href="javascript:;">赞</a>
                                </div>
                                 <div class="people" total="2980">2980人觉得很赞</div>
                                <div class="comment-list">
                                    <div class="comment" user="self">
                                        <div class="comment-left"> <img src="{{ asset('static/index/images/details/img2.jpg') }}" width="30px" height="30px"></div>
                                   
                               
                                        <div class="comment-right">
                                            <div class="comment-text">
                                                <span class="user">老王：</span>
                                                 我住隔壁我姓王
                                            </div>
                                            <div class="comment-date">02-14 22:00
                                                 <a class="comment-zan" href="javascript:;" total="23" my="1">23 取消赞</a>
                                                 <a class="comment-dele" href="javascript:;">回复</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment" user="self">
                                          <div class="comment-left">
                                            <img src="{{ asset('static/index/images/details/img3.jpg') }}" width="30px" height="30px">
                                          </div>
                                          <div class="comment-right">
                                              <div class="comment-text">
                                                <span class="user">我：</span>看哭了留卡号吧
                                              </div>
                                              <div class="comment-date">02-14 24:00
                                                <a class="comment-zan" href="javascript:;" total="0" my="0">赞</a>
                                                <a class="comment-dele" href="javascript:;">删除</a>
                                              </div>
                                          </div>
                                    </div>
                                </div>
                                     <div class="hf">
                                         <textarea type="text" class="hf-text" autocomplete="off" maxlength="100">评论…</textarea>
                                         <button class="hf-btn">回复</button>
                                         <span class="hf-nub">0/100</span>
                                     </div> 
                                </div>
                             </li>
                             <li class="list0">
                             <a class="close" href="javascript:;">X</a>
                             <div class="head">
                                <img src="{{ asset('static/index/images/details/img4.jpg') }}" width="60px" height="60px">
                            </div>
                             <div class="content">
                             <p class="text"><span class="name">Andy：</span>哈哈哈哈哈谁还没个妈～//@我的朋友是个呆B: 饮水机那个蕾丝罩我给跪了//@八卦_我实在是太CJ了:仿佛看到了自己家</p> 
                             <div class="pic">
                                <img src="{{ asset('static/index/images/details/img1.jpg') }}" width="30px" height="30px">
                            </div>
                             <div class="good">
                                <span class="date">02-14 23:01</span>
                                <a class="dzan" href="javascript:;">赞</a>
                            </div>
                             <div class="people" total="0" style="display: none;">
                                 
                             </div>
                             <div class="comment-list">
                             <div class="comment" user="self">
                              <div class="comment-left">
                                <img src="{{ asset('static/index/images/details/16.png') }}" width="30px" height="30px">
                            </div>
                              <div class="comment-right">
                              <div class="comment-text">
                                <span class="user">我：</span>
                                看哭了留卡号吧</div>
                              <div class="comment-date">02-14 24:00
                              <a class="comment-zan" href="javascript:;" total="286" my="1">286 取消赞</a>
                              <a class="comment-dele" href="javascript:;">删除</a>
                              </div>
                              </div>
                             </div>
                             </div>
                             <div class="hf">
                             <textarea type="text" class="hf-text" autocomplete="off" maxlength="100">评论…</textarea>
                             <button class="hf-btn">回复</button>
                             <span class="hf-nub">0/100</span>
                             </div>
                             </div>
                             </li>
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
    </article>
@endsection

@section('js')
    <script type="text/javascript"> 
         //在页面加载完后立即执行多个函数。
         function addloadEvent(func){
         var oldonload=window.onload;
         if(typeof window.onload !="function"){
          window.onload=func;
         }
         else{
          window.onload=function(){
          if(oldonload){
           oldonload(); 
          }
          func();
          }
         }
         }
         addloadEvent(b);
         function b(){
         var pn=document.getElementById("pn");
         var lists=pn.children;
         //删除当前节点
         function remove(node){
         node.parentNode.removeChild(node);
         }
         //上面的点赞
         function praisebox(box,el){
         //获取赞数量容器
         var praise=box.getElementsByClassName("people")[0];
         //获取容器当前total值
         var total=parseInt(praise.getAttribute("total"));
         //获取点击的innerHTML
         var txt=el.innerHTML;
         //创建一个新的total存储用
         var newtotal;
         //判断点击的文字内容
         if(txt=="赞"){
         //total值+1 因为我还没点击赞，所以要点击的时候就多了一个人 total+1
         newtotal=total+1;
         //判断赞数量 把相应文字放到赞容器里
         praise.innerHTML=newtotal==1 ? "我觉得很赞" : "我和" + total +"个人觉得很赞";
         el.innerHTML="取消赞";
         }
         else{
         //反之total值-1
         newtotal=total-1;
         praise.innerHTML=newtotal==0 ? "" : newtotal +"个人觉得很赞";
         el.innerHTML="赞";
         }
         //更新total值
         praise.setAttribute("total",newtotal);
         //如果没有人点赞容器隐藏
         praise.style.display=(newtotal==0) ? "none" : "block";
         }
         //回复评论
         function reply(box){
         //获取评论框
         var textarea=box.getElementsByTagName("textarea")[0];
         //获取包含所有评论的容器
         var comment=box.getElementsByClassName("comment-list")[0];
         //创建新的评论div
         var div=document.createElement("div");
         //赋类名
         div.className="comment";
         //设置属性
         div.setAttribute("user","self");
         //获取每条评论的innerHTML结构，每次只替换textarea的输入内容和 当前发送时间
         var html='<div class="comment-left">'+'<img src="images/T2.jpg" alt=""/>'+'</div>'+
          '<div class="comment-right">'+
          '<div class="comment-text"><span>我：</span>'+textarea.value+'</div>'+
          '<div class="comment-date">'+
          getTime()+
          '<a class="comment-zan" href="javascript:;" total="0" my="0">赞</a>'+
          '<a class="comment-dele" href="javascript:;">删除</a>'+
          '</div>'+
          '</div>';
         //插入到新建的评论div
         div.innerHTML=html;
         //把新评论插入到评论列表
         comment.appendChild(div);
         //评论后初始化textarea输入框
         textarea.value="评论…";
         textarea.parentNode.className="hf";
         }
         //获取当前时间回复评论时调用
         function getTime(){
         var t=new Date();
         var y=t.getFullYear();
         var m=t.getMonth()+1;
         var d=t.getDate();
         var h=t.getHours();
         var mi=t.getMinutes();
         m=m<10?"0"+m:m;
         d=d<10?"0"+d:d;
         h=h<10?"0"+h:h;
         mi=mi<10?"0"+mi:mi;
         return y+"-"+m+"-"+d+""+h+":"+mi;
         }
         //回复里点赞
         function praiseReply(el){
         //获取当前total值 也就是所有点赞数量
         var total=parseInt(el.getAttribute("total"));
         //获取当前my值 我的点赞
         var my=parseInt(el.getAttribute("my"));
         //创建新的total
         var newtotal;
         //判断my=0就是我准备要点赞
         if(my==0){
         //我点了赞总数量就要+1
         newtotal=total+1;
         //更新total值
         el.setAttribute("total",newtotal);
         //更新my值
         el.setAttribute("my",1);
         //更新文字 就是我点了后 文字就是取消赞了
         el.innerHTML=newtotal+" 取消赞";
         }else{
         //反之-1
         newtotal=total-1;
         el.setAttribute("total",newtotal);
         el.setAttribute("my",0);
         el.innerHTML=(newtotal==0)?" 赞":newtotal+" 赞";
         }
         }
         //操作回复
         function operateReply(el){
         //每条评论
         var comment=el.parentNode.parentNode.parentNode;
         //整个状态
         var box=comment.parentNode.parentNode.parentNode;
         //评论框
         var textarea=box.getElementsByTagName("textarea")[0];
         //名字
         var user=comment.getElementsByClassName("user")[0];
         //点击的innerHTML
         var txt=el.innerHTML;
         //判断当前点击的是否为回复
         if(txt=="回复"){
         //评论框触发焦点事件 也就是变高
         textarea.onfocus();
         //内容变为回复+当前人的名字
         textarea.value="回复 "+user.innerHTML;
         //调用键盘事件
         textarea.onkeyup();
         }else{
         //否则就是删除节点
         remove(comment);
         }
         }
         //遍历所有状态消息
         for(var i=0;i<lists.length;i++){
         //全部事件代理
         lists[i].onclick=function(e){
         //获取当前点击事件
         var e=e||window.event;
         var el=e.srcElement;
         if(!el){
         el=e.target;//兼容火狐
         }
         //判断点击的类名
         switch(el.className){
         //关闭整个状态
         case "close":
         remove(el.parentNode);
         break;
         //上面的点赞
         case "dzan":
         praisebox(el.parentNode.parentNode.parentNode,el);
         break;
         //回复评论
         case "hf-btn hf-btn-on":
         reply(el.parentNode.parentNode.parentNode);
         break;
         //每条评论中点赞
         case "comment-zan":
         praiseReply(el);
         break;
         case "comment-dele":
         operateReply(el);
         break;
         }
         }
         var textarea=lists[i].getElementsByClassName("hf-text")[0];
         //焦点事件
         textarea.onfocus=function(){
         this.parentNode.className='hf hf-on';
         this.value = this.value == '评论…' ? '' : this.value;
         }
         //失焦事件
         textarea.onblur=function(){
         if(this.value==''){
         this.parentNode.className='hf';
         this.value ='评论…'; 
         } 
         }
         //键盘事件
         textarea.onkeyup=function(){
         var len=this.value.length;
         var textParentNode=this.parentNode;
         var textBtn=textParentNode.children[1];
         var textNub=textParentNode.children[2];
         if(len==0 /*|| len>100*/){
         textBtn.className="hf-btn";
         }else{
         textBtn.className="hf-btn hf-btn-on";
         /*this.style.color="#333"; */ 
         }
         textNub.innerHTML=len+"/100";
         }
         }
         //遍历结束
         } 
    </script>
@endsection 

