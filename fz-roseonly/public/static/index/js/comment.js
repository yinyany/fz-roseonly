$(function(){
    // ++++++++++ 左边两个logo图标+链接 +++++++++++
    $('#head .head_left > a').click(function(){
        $(this).addClass('onHead').siblings().removeClass('onHead');
    })

    // ++++++++++ 导航条 +++++++++++
    $('#nav ul > .list > li').mouseover(function(){
        $(this).addClass('on');
        $(this).children('a').css('color','#000');
        $(this).children('div.next').css('display','block');
    }).mouseout(function(){
        $(this).removeClass('on');
        $(this).children('a').css('color','#fff');
        $(this).children('div.next').css('display','none');
    })
    // ++++++++++ 导航条随屏幕滚动的显示和隐藏 +++++++++++
        $(window).scroll(function(){
            if ($(window).scrollTop() > 80) {
                $('#nav').addClass('on');
                $('#nav > ul div.logo').css('display','block');
                $('#nav > ul li').css('margin','0 12px');
                $('#nav > ul .head_right').css('display','block');
                $('#nav > ul .head_right').children().css('color','#fff');
            }else{
                $('#nav').removeClass('on');
                $('#nav ul div.logo').css('display','none');
                $('#nav > ul li').css('margin','0 30px');
                $('#nav > ul .head_right').css('display','none');
                $('#nav > ul .head_right').children().css('color','#000');
            }
        })

    // ++++++++++ 扫描二维码弹框 +++++++++++
    $('#footer > .left p > a.weixin').hover(function(){
        $('#rose-big').toggle();
    })
    // ++++++++++++侧边栏切换效果+++++++++++++++++
    $('#side .block').hover(function(){
        $(this).children('p').toggle();
    })
    // ++++++++++++快速回顶部图标的隐藏和显示+++++++++++++++++
    $(window).scroll(function(){
        if($(window).scrollTop() > 1000){
            $('#side > .top').show();
        }else{
            $('#side > .top').hide();
        }
    })
})