 $(function(){
	//获取任意一个ul里面li的宽度
	var liW  = $('.fadeDiv ul li').eq(0).width();
	//获取ul的宽度
	var ulW  = $('.fadeDiv ul').eq(0).width();
	// alert(liW);
	//index1控制小图标
	var index1 = 0;
	//index2控制图片移动
	var index2 = 0;
	var timeId = null;
	//手动轮播的实现
	$('.fadeDiv ol li').click(function(){
		$(this).addClass('selected').siblings().removeClass('selected');
		var index = $(this).index();
        // $('.fadeDiv ul').css('left',-index*liW);
        $('.fadeDiv ul').animate({'left':-(index*liW)},1000);
        //文字的变化
		var text = $('.fadeDiv ul li img').eq(index).attr('alt');
		$('.text').html(text);

		index1 = index;
		index2 = index;
	})

    //自动轮播的实现
	function slide(){
		if(index1==$('.fadeDiv ol li').length-1){
			//把第一张图片定位到最后一张图片的后面
			$('.fadeDiv ul li').eq(0).css({'position':'relative','left':ulW});
                    index1 = 0;
		}else{
                        index1++;
		}
		  index2++;
		//自动轮播的时候，ol里面的每个li加上selected类，其他的同级元素移除selected类
       $(".fadeDiv ol li").eq(index1).addClass('selected').siblings().removeClass('selected');
        //ul根据下标*li的宽度移动位置，函数加在后面是ul移动位置之后，再去执行函数里面的
        //

       $('.fadeDiv ul').animate({'left':-(index2*liW)},1000,function(){
       	 if(index1 == 0){
       	  //当显示移动后的第一张图片的时候，第一张图片回归之前的位置
           $('.fadeDiv ul li').eq(0).css('position','static');
           //ul距离左边的距离为0
           $('.fadeDiv ul').css('left','0px');
           //index2的值设置为0
           index2 = 0;
         }
       });
       //文字的变化
	   var text = $('.fadeDiv ul li img').eq(index1).attr('alt');
	   $('.text').html(text);
	}
	timeId = setInterval(slide,2000);


	function slideLeft(){
		if(index1==0){
            index1 = $('.fadeDiv ol li').length-1;
             //把第一张图片定位到最后一张图片的后面
            $('.fadeDiv ul li').eq(index1).css({'position':'relative','left':-ulW});
		}else{
           index1--;
		}
		index2--;
		//自动轮播的时候，ol里面的每个li加上selected类，其他的同级元素移除selected类
       $(".fadeDiv ol li").eq(index1).addClass('selected').siblings().removeClass('selected');
       //ul根据下标*li的宽度移动位置，函数加在后面是ul移动位置之后，再去执行函数里面的
       $('.fadeDiv ul').animate({'left':-(index2*liW)},1000,function(){
       	 if(index1 ==$('.fadeDiv ol li').length-1){
       	   //当显示移动后的最后一张图片的时候，最后一张图片回归之前的位置
           $('.fadeDiv ul li').eq(index1).css('position','static');
            //ul距离左边的距离为-2400px
           $('.fadeDiv ul').css('left','-2400px');
           //index2的值设置为3
           index2 = index1;
         }
       });

       //文字的变化
		var text = $('.fadeDiv ul li img').eq(index1).attr('alt');
		$('.text').html(text);
	}

     //鼠标移入暂停
	$('.fadeDiv').mouseover(function(){
		$('.fadeDiv .arrow').css('display','block');
        clearInterval(timeId);
        //鼠标移除继续
	}).mouseout(function(){
		$('.fadeDiv .arrow').css('display','none')
        timeId = setInterval(slide,2000);
	})

    //点击右箭头的实现
	$('.right').click(function(){
		slide();
	})

    //点击左箭头的实现
	$('.left').click(function(){
		slideLeft();
	})
})


// 热卖推荐
$(function(){
	 $("#title p").mouseover(function(){
	 $(this).addClass("selected1").siblings().removeClass("selected1"); //切换选中的按钮高亮状态
	 var index=$(this).index();
	  //获取被按下按钮的索引值，需要注意index是从0开始的
	 
	 $("#con ul").eq(index).show().siblings().hide(); 
	//在按钮选中时在下面显示相应的内容，同时隐藏不需要的框架内容
	
 });
});


//订单数量
$(function(){
	$("#num_box ul li").mouseover(function(){
		$(this).addClass("patterm").siblings().removeClass("patterm");
	var oplu=parseInt($("#number").val());
	$("#num_box ul li.plus").click(function(){		
		oplu++;
		$("#number").val(oplu);
	})
	$("#num_box ul li.reduce").click(function(){
		
		if(oplu>1){
			oplu--;
		}
		$("#number").val(oplu);

	 })
	})

})






 