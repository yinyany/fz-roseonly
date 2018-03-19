window.onload = function(){
   alert();
                        var btn = document.getElementsByClassName('add_address')[0];
                        var divEle = document.getElementById('add');
                        btn.onclick = function(){
                           if(divEle.style.display == 'block'){
                              divEle.style.display = 'none';
                              btn.innerHTML = '添加新地址';
                           }else{
                              divEle.style.display = 'block';
                              btn.innerHTML = '取消';
                           } 
                          
                        }
                      }