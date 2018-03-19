// 轮播图
$(function(){
    // +++++++++++++ banner ++++++++++++++++
    var index1 = 0;
    // var index2 = 0;
    var banner_index = $('#banner .icon > li').index();
    var bannerWidth = $('#banner ul.banner > li').width();
    var time = null;
    //var bannerText = $('#banner ul.banner').html();
    //alert(bannerText);
    
    // 手动轮播
    $('#banner ul.icon > li').click(function(){
        var icon_index = $(this).index();
        // alert(icon_index);
        index1 = icon_index;
        $('#banner ul.icon > li').eq(icon_index).addClass('banner_hover').siblings().removeClass('banner_hover');
        $('#banner ul.banner').animate({'left':-icon_index*bannerWidth});
    })

    // 自动轮播
    function timeId(){
        // index1 = index2;
        if (index1 == $('#banner .banner > li').length-1) {
            index1 = 0;
        }else{
            index1 ++;
        }
        $('#banner ul.banner').animate({'left':-index1*bannerWidth});
        $('#banner ul.icon > li').eq(index1).addClass('banner_hover').siblings().removeClass('banner_hover');
    }

    function timeLeftId(){
        // index1 = index2;
        if (index1 == 0) {
            index1 = $('#banner .banner > li').length-1;
        }else{
            index1 --;
        }
        $('#banner ul.banner').animate({'left':-index1*bannerWidth});
        $('#banner ul.icon > li').eq(index1).addClass('banner_hover').siblings().removeClass('banner_hover');
    }
    time = setInterval(timeId,3000);

    $('#banner').mouseover(function() {
        $('#banner > .arrow').show();
        clearInterval(time);
    }).mouseout(function() {
        $('#banner > .arrow').hide();
        time = setInterval(timeId,3000)
    });

    

    // 左右箭头切换
    // 
    $('#banner .arrow > .left').click(function(){
        timeLeftId();
    })
    $('#banner .arrow > .right').click(function(){
        timeId();
    })
})


// 首页推荐recommend
$(function(){
    var index = $('#recommend .product > .title > li').index();
    var time = null;
    function timeId(){
        if (index == $('#recommend .product > .title > li').length-1) {
            index = 0;
        }else{
            index ++;
        }
        $('#recommend .product > .title > li').eq(index).addClass('product_hover').siblings().removeClass('product_hover');
        $('#recommend .product > div.list > ul').eq(index).css({'display':'block'}).siblings().css({'display':'none'});
    }
    time = setInterval(timeId,2000);
    $('#recommend .product > .title > li').mouseover(function(){
        clearInterval(time);
    }).mouseout(function(){
        time = setInterval(timeId,2000);
    })
    $('#recommend .product > div.list').mouseover(function(){
        clearInterval(time);
    }).mouseout(function(){
        time = setInterval(timeId,2000);
    })
    $('#recommend .product > .title > li').mouseover(function(){
        var index = $(this).index();
        $(this).addClass('product_hover').siblings().removeClass('product_hover');
        $('#recommend .product > div.list > ul').eq(index).css({'display':'block'}).siblings().css({'display':'none'});
    })
    $('#recommend .product > div.list > ul > li').mouseover(function(){
        $(this).css({'background':'#eee'});
    }).mouseout(function(){
        $(this).css({'background':'rgba(0,0,0,0)'});
    })
})

// 分类列表 classify
