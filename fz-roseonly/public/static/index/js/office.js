// 省市二级联动
window.onload = function(){
       var provinces = ["全国","山西","山东","河南","河北","湖南","湖北"];
       var citys = [
                      [""],
                      ["太原"],
                      ["济南市","青岛市","淄博市","枣庄市","东营市","烟台市","潍坊市","济宁市","泰安市","威海市"],
                      ["郑州市","开封市","洛阳市","平顶山市","安阳市","鹤壁市","新乡市","焦作市","濮阳市","许昌市"],
                      ["石家庄市","唐山市","秦皇岛市","邯郸市","邢台市","保定市","张家口市","承德市","沧州市","廊坊市"],
                      ["长沙市","衡阳市","邵阳市","岳阳市","张家界市","永州市","常德市","株洲市","益阳市","湘潭市"],
                      ["武汉市","黄石市","十堰市","宜昌市","襄阳市","鄂州市","荆门市","咸宁市","随州市","孝感市"]
            ];

        window.onload = function(){
            //获取省的元素节点
            var provinceEle = document.getElementById('province');
            //获取市的元素节点
            var cityEle = document.getElementById('city');
            for(var i=0;i<provinces.length;i++){
                //创建省里面的option元素节点
               var provinceOption = document.createElement('option');
               provinceOption.innerText = provinces[i];
               provinceOption.value = i;
               //把每个省添加到省区里面
               provinceEle.appendChild(provinceOption);
            }

            //onchange事件：当内容改变的时候，触发的事件
            provinceEle.onchange = function(){
                var index = provinceEle.value;
                // alert(index);
                var city = citys[index];
                // alert((city.length > 1)?'请选择城市':city[0]);
                cityEle.innerHTML = '<option value="">'+(city.length > 1)?'请选择城市':city[0]+'</option>';
                // 
                for(var i=0;i<city.length;i++){
                  //创建市里面的option元素节点
                  var cityOption = document.createElement('option');
                  cityOption.innerHTML = city[i];
                  cityOption.value = i;
                  //把每个省里的市添加到市区里面
                  cityEle.appendChild(cityOption);
                }
            }
        }   
}

// 轮播图
$(function(){
    // +++++++++++++ banner ++++++++++++++++
    var index1 = 0;
    var banner_index = $('#banner .icon > li').index();
    var bannerWidth = $('#banner ul.banner > li').width();
    var time = null;
    
    // 自动轮播
    function timeId(){
        if (index1 == $('#banner .banner > li').length-1) {
            index1 = 0;
        }else{
            index1 ++;
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

    // 手动轮播
    $('#banner ul.icon > li').click(function(){
        var icon_index = $(this).index();
        index1=icon_index;
        $('#banner ul.icon > li').eq(icon_index).addClass('banner_hover').siblings().removeClass('banner_hover');
        $('#banner ul.banner').animate({'left':-icon_index*bannerWidth});
    })
})


// 地址弹框 position_map
$(function(){
    // 点击定位按钮弹出地址弹框
    $('#address .offic_details h3 > .position').click(function(){
        $('body').css({'background':'rgba(0,0,0,.2)'});
        $('#position_map').css('display','block');
    })
    // 关闭弹框
    $('#position_map .title > .map_btn').click(function(){
        $('#position_map').css('display','none');
        $('body').css({'background':'rgba(0,0,0,0)'});
    })
})

// 发送手机弹框
$(function(){
    $('#address .offic_details h3 > .tel_btn').click(function(){
        $('body').css({'background':'rgba(0,0,0,.2)'});
        $('#tel').css('display','block');
    })
    // 关闭弹框
    $('#tel .title > .close').click(function(){
        $('#tel').css('display','none');
        $('body').css({'background':'rgba(0,0,0,0)'});
    })
})


// 验证码
    //设置一个全局的变量，便于保存验证码
    var code;
    function createCode(){
        //首先默认code为空字符串
        code = '';
        //设置长度，这里看需求，我这里设置了4
        var codeLength = 4;
        var codeV = document.getElementById('code');
        //设置随机字符
        var random = new Array(0,1,2,3,4,5,6,7,8,9);
        //循环codeLength 我设置的4就是循环4次
        for(var i = 0; i < codeLength; i++){
            //设置随机数范围,这设置为0 ~ 36
             var index = Math.floor(Math.random()*10);
             //字符串拼接 将每次随机的字符 进行拼接
             code += random[index]; 
        }
        //将拼接好的字符串赋值给展示的Value
        codeV.value = code;
    }

    //下面就是判断是否== 的代码，无需解释
    function validate(){
        var oValue = document.getElementById('input').value.toUpperCase();
        if(oValue ==0){
            alert('请输入验证码');
        }else if(oValue != code){
            alert('验证码不正确，请重新输入');
            oValue = ' ';
            createCode();
        }else{
            window.open('http://www.baidu.com','_self');
        }
    }

    //设置此处的原因是每次进入界面展示一个随机的验证码，不设置则为空
    window.onload = function (){
        createCode();
    }