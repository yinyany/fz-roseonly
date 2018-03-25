$(function(){
    // 导航切换
    $('#order nav>a').click(function(){
        $(this).addClass('nav_hover').siblings('a').removeClass('nav_hover');
        var index = $(this).index();
        // alert(index);
            $('#order .order_con .sec').eq(index).show().siblings('div').hide();
        
    })
    

    // 导航切换
    $('#order .order_con .sec4 h3>a').click(function(){
        $(this).addClass('person_hover').siblings().removeClass('person_hover');
       var index1 = $(this).index();
        $('#order .order_con .sec3').eq(index1).show().siblings('div').hide();
    })
})

