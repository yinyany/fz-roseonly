

$(function(){
    // 导航切换
    $('#paixu a').click(function(){
        $(this).addClass('selected').siblings().removeClass('selected');
        // var index = $(this).index();
        // alert(index);
        //  $('#paixu a').eq(index).show().siblings('div').hide();
        
    })
})