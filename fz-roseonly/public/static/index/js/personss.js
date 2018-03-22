window.onload = function(){

    // 添加显示与隐藏 
  var btn = document.getElementsByClassName('tianjia')[0];
  var divEle = document.getElementById('content-wrap');
  btn.onclick = function(){
     if(divEle.style.display == 'block'){
        divEle.style.display = 'none';
        btn.innerHTML = '添加新地址';
        btn.style = 'color:#414141';

     }else{
        divEle.style.display = 'block';
        btn.innerHTML = '取消';
        btn.style = 'color:red';
     } 
    
  }

  var tijiao = document.getElementById('baocun');


  tijiao.onclick = function(){

      var shpeople = document.getElementsByName('shpeople')[0].value;
      var shphone = document.getElementsByName('shphone')[0].value;
      var province = document.getElementsByName('cho_Province')[0].value;
      var city = document.getElementsByName('cho_City')[0].value;
      var area = document.getElementsByName('cho_Area')[0].value;
      var dizhi = document.getElementsByName('xxdizhi')[0].value;
      var postcode = document.getElementsByName('postcode')[0].value;
      var shaddress = province+city+area+dizhi;

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({  
                cache: false,
                type: "POST",
                url: "/shopcar/create",
                data: {'shpeople':shpeople,'shphone':shphone,'shaddress':shaddress,'postcode':postcode},
                async: true,//相当于ajax里的同步异步 
                success:function(msg){
                  window.location.reload();
                },
                error:function(msg){
                    // alert("失败");
                }

            })

               divEle.style.display = 'none';
               btn.innerHTML = '添加新地址';
               btn.style = 'color:#414141';
  }

 

}