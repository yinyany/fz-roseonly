$(function(){
	// 查看保养js效果
	$(function(){
	    $('.take .take_one .take_title dt').click(function(){
	        var index = $(this).index();
	        $('.take .take_one .take_des dd').eq(index).show().siblings('dd').hide();
	    })
	    $('.take .take_two .take_title dt').click(function(){
	        var index = $(this).index();
	        $('.take .take_two .take_des dd').eq(index).show().siblings('dd').hide();
	    })
	})
})


 

            
