 window.onload = function () {
        if (!document.getElementsByClassName) {
            document.getElementsByClassName = function (cls) {
                var ret = [];
                var els = document.getElementsByTagName('*');
                for (var i = 0, len = els.length; i < len; i++) {

                    if (els[i].className.indexOf(cls + ' ') >=0 || els[i].className.indexOf(' ' + cls + ' ') >=0 || els[i].className.indexOf(' ' + cls) >=0) {
                        ret.push(els[i]);
                    }
                }
                return ret;
            }
        }

        var table = document.getElementById('cartTable'); // 购物车表格
        var selectInputs = document.getElementsByClassName('check'); // 所有勾选框
        var checkAllInputs = document.getElementsByClassName('check-all') // 全选框
        var tr = table.children[1].rows; //行
        var selectedTotal = document.getElementById('selectedTotal'); //已选商品数目容器
        var priceTotal = document.getElementById('priceTotal'); //总计
        var deleteAll = document.getElementById('deleteAll'); // 删除全部按钮
        var selectedViewList = document.getElementById('selectedViewList'); //浮层已选商品列表容器
        var selected = document.getElementById('selected'); //已选商品
        var foot = document.getElementById('foot');
        var jiesuan = document.getElementById('jiesuan');
        

        // 更新总数和总价格，已选浮层
        function getTotal() {
            var seleted = 0;
            var price = 0;
            var HTMLstr = '';
            for (var i = 0, len = tr.length; i < len; i++) {
                if (tr[i].getElementsByTagName('input')[0].checked) {
                    tr[i].className = 'on';
                    seleted += parseInt(tr[i].getElementsByTagName('input')[1].value);
                    price += parseFloat(tr[i].cells[4].innerHTML);
                    HTMLstr += '<div><img src="' + tr[i].getElementsByTagName('img')[0].src + '"><span class="del" index="' + i + '">取消选择</span></div>'
                }
                else {
                    tr[i].className = '';
                }
            }
            selectedTotal.innerHTML = seleted;
            priceTotal.innerHTML = price.toFixed(2);
            selectedViewList.innerHTML = HTMLstr;

            if (seleted == 0) {
                foot.className = 'foot';
            }
        }

        // 计算单行价格
        function getSubtotal(tr) {
            var cells = tr.cells;
            var price = cells[2]; //单价
            var subtotal = cells[4]; //小计td
            var countInput = tr.getElementsByTagName('input')[1]; //数目input
            var span = tr.getElementsByTagName('span')[1]; //-号

            //写入HTML
            subtotal.innerHTML = (parseInt(countInput.value) * parseFloat(price.innerHTML)).toFixed(2);
            //如果数目只有一个，把-号去掉
            if (countInput.value == 1) {
                span.innerHTML = '';
            }else{
                span.innerHTML = '-';
            }
        }

        // 点击选择框
        for(var i = 0; i < selectInputs.length; i++ ){
            selectInputs[i].onclick = function () {
                if (this.className.indexOf('check-all') >= 0) { //如果是全选，则吧所有的选择框选中
                    for (var j = 0; j < selectInputs.length; j++) {
                        selectInputs[j].checked = this.checked;
                    }
                }
                if (!this.checked) { //只要有一个未勾选，则取消全选框的选中状态
                    for (var i = 0; i < checkAllInputs.length; i++) {
                        checkAllInputs[i].checked = false;
                    }
                }
                getTotal();//选完更新总计
            }
        }

        //更新数据库商品
        function subshopcar(id,num){
            // ajax 提交
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({  
                cache: false,
                type: "POST",
                // url: '{{url("shopcar.update.id")}}',
                url: "shopcar/update/"+id,

                data: {'num':num},
                async: true,//相当于ajax里的同步异步 
                success:function(msg){
                    // alert("成功");
                },
                error:function(msg){
                    // alert("失败");
                }
            })          
        }

        //删除商品
        function delshop(id){
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

              $.ajax({  
                cache: false,
                type: "POST",
                // url: '{{url("shopcar.update.id")}}',
                url: "shopcar/destroy/"+id,
                async: true,//相当于ajax里的同步异步 
                success:function(msg){
                    // alert("成功");
                },
                error:function(msg){
                    // alert("失败");
                }
            })          
        }

        //提交商品
        function subtoorder(id,num){
            // ajax 提交
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({  
                cache: false,
                type: "POST",
                // url: '{{url("shopcar.update.id")}}',
                url: "shopcar/store",
                data: {'goods_id':'id','goods_num':num},
                async: true,//相当于ajax里的同步异步 
                success:function(msg){
                    // alert("成功");
                },
                error:function(msg){
                    // alert("失败");
                }
            })          
        }

        //获取总价和订单号
        function subordernum(ordernum,totalprice,info){
            // ajax 提交
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({  
                cache: false,
                type: "POST",
                // url: '{{url("shopcar.update.id")}}',
                url: "shopcar/store",
                data: {'order_number':ordernum,'pay_prices':totalprice,'info':info},
                async: true,//相当于ajax里的同步异步 
                success:function(msg){
                    // alert("成功");
                },
                error:function(msg){
                    // alert("失败");
                }
            })
        }



        // 显示已选商品弹层
        selected.onclick = function () {
            if (selectedTotal.innerHTML != 0) {
                foot.className = (foot.className == 'foot' ? 'foot show' : 'foot');
            }
        }

        //已选商品弹层中的取消选择按钮
        selectedViewList.onclick = function (e) {
            var e = e || window.event;
            var el = e.srcElement;
            if (el.className=='del') {
                var input =  tr[el.getAttribute('index')].getElementsByTagName('input')[0]
                input.checked = false;
                input.onclick();
            }
        }

        //为每行元素添加事件
        for (var i = 0; i < tr.length; i++) {
            //将点击事件绑定到tr元素
            tr[i].onclick = function (e) {
                var e = e || window.event;
                var el = e.target || e.srcElement; //通过事件对象的target属性获取触发元素
                var cls = el.className; //触发元素的class
                var countInout = this.getElementsByTagName('input')[1]; // 数目input
                var value = parseInt(countInout.value); //数目
                var godid = this.getElementsByTagName('input')[2].value; // 获取id的值 

                // console.log(godid);
                // var goodsnum = countInout.value;
                //通过判断触发元素的class确定用户点击了哪个元素
                switch (cls) {
                    case 'add': //点击了加号
                        countInout.value= value + 1;
                        getSubtotal(this);
                        subshopcar(godid,countInout.value);
                        break;
                    case 'reduce': //点击了减号
                        if (value > 1) {
                            countInout.value = value - 1;
                            getSubtotal(this);
                            subshopcar(godid,countInout.value);
                        }
                        break;
                    case 'delete': //点击了删除
                        var conf = confirm('确定删除此商品吗？');
                        if (conf) {
                            delshop(godid);
                            this.parentNode.removeChild(this);
                        }
                        break;
                }
                getTotal();
            }
            // 给数目输入框绑定keyup事件
            tr[i].getElementsByTagName('input')[1].onkeyup = function () {
                
                var god = this.parentNode.getElementsByClassName('id')[0].value;
                // console.log(god);

                var val = parseInt(this.value);
                if (isNaN(val) || val <= 0) {
                    val = 1;
                }
                if (this.value != val) {
                    this.value = val;
                }
                getSubtotal(this.parentNode.parentNode); //更新小计
                subshopcar(god,this.value);
                getTotal(); //更新总数
            }
        }

        //点击提交订单

       // $("#jiesuan").click(function(){

       //      $.ajaxSetup({
       //              headers: {
       //                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       //              }
       //      });
       //      var tr=$(".on");
       //      var id[] = tr.children(".goodsid").val(); 
       //      print_r(id);
       //      // $.ajax({
       //      //     cache: false,
       //      //     type: "POST",
       //      //     url: "",
       //      //     data: {id:id,_token:"{{ csrf_token()}}"},
       //      //     async: true,//相当于ajax里的同步异步 
       //      //     success:function(msg){

       //      //     },
       //      //     error:function(msg){
       //      //         alert("123");
       //      //     }
       //      // })            
       //  }) 

        // var id = tr[1].getElementsByTagName('input')[2].value;
        //  alert(id); 

        jiesuan.onclick = function(){
            var goid='';
            var gonum='';
            for (var i = 0; i < tr.length; i++) {               
                if(tr[i].getElementsByTagName('input')[0].checked){
                    // console.log(tr[i].getElementsByTagName('input')[2].value);
                    var goodid = tr[i].getElementsByTagName('input')[2].value;
                    var goodnum = tr[i].getElementsByTagName('input')[1].value;

                    goid +=goodid+"@";   
                    gonum +=goodnum+"@";
                    // subtoorder(goodid,goodnum);//提交已选商品
                    // delshop(tr[i].getElementsByTagName('input')[2].value); //购物车删除提交后的商品
                     tr[i].parentNode.removeChild(tr[i]); // 删除相应节点
                            i--; //回退下标位置
                }
            }
            var totalprices = priceTotal.innerHTML;
            var ordernum = this.getElementsByTagName('input')[0].value;
            // console.log(ordernum);
            // subordernum(ordernum,totalprices,ginfo);
            
            window.location.href="shopcar/store"+'?goid='+goid+'&gonum='+gonum+'&totalprices='+totalprices+'&ordernum='+ordernum;

        }



        // 点击全部删除
        deleteAll.onclick = function () {
            if (selectedTotal.innerHTML != 0) {
                var con = confirm('确定删除所选商品吗？'); //弹出确认框
                if (con) {
                    for (var i = 0; i < tr.length; i++) {
                        // 如果被选中，就删除相应的行
                        if (tr[i].getElementsByTagName('input')[0].checked) {
                            // console.log(tr[i].getElementsByTagName('input')[2].value);
                            // delshop(tr[i].getElementsByTagName('input')[2].value);
                            tr[i].parentNode.removeChild(tr[i]); // 删除相应节点
                            i--; //回退下标位置
                        }
                    }
                }
            } else {
                alert('请选择商品！');
            }
            getTotal(); //更新总数
        }
        console.log("\u767e\u5ea6\u641c\u7d22\u3010\u7d20\u6750\u5bb6\u56ed\u3011\u4e0b\u8f7d\u66f4\u591aJS\u7279\u6548\u4ee3\u7801");
        // 默认全选
        checkAllInputs[0].checked = true;
        checkAllInputs[0].onclick();
             

    }
