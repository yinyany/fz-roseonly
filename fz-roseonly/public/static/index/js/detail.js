$(function(){
	
	$('.fadeLeft > ol > li').click(function(){
	    var index = $(this).index();
	    $(this).addClass('selected').siblings().removeClass('selected');
	    $('.fadeLeft > ul > li').eq(index).css({'display':'block'}).siblings().css({'display':'none'});
	})
	$("#num_box ul li").mouseover(function(){
		$(this).addClass("patterm").siblings().removeClass("patterm");
		var oplu=parseInt($("#number").val());
		$("#num_box ul li.plus").click(function(){
			var kucun=parseInt($("#kucun").html());
			if(kucun > oplu){
				oplu++;
				$("#number").val(oplu);
			}	
		})
		$("#num_box ul li.reduce").click(function(){
			if(oplu>1){
				oplu--;
			}
			$("#number").val(oplu);

		 })
	})
})


$(function(){
    $('#detail h2.title span').click(function(){
        var index = $(this).index();
        $(this).css({'color':'red'}).siblings().css('color','#434343');
        $('#detail div.cont > div').eq(index).css({'display':'block'}).siblings().css('display','none');
    })
})


// 热卖推荐
$(function(){
    $("#title > p > span").mouseover(function(){
        var index = $(this).index();
        $(this).addClass('selected1').siblings().removeClass("selected1");
        $('.recom > ul').eq(index).css({'display':'block'}).siblings().css('display','none');
    })
})



// 评论
