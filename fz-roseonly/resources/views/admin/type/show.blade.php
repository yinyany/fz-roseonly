<style type="text/css">

div, ul, li {
    margin: 0px;

    padding: 0px;

    list-style-type: none;

}
body {

    background-color: #FFFFFF;

    font-size: 12px;

    margin: 0px;

    padding: 0px;

}
#TreeList {

    background-color: #FFFFFF;

    margin-top: 6px;

    margin-right: 9px;

    margin-bottom: 6px;

    margin-left: 9px;

    border: 1px solid #5d7b96;

    padding-bottom: 6px;

    padding-left: 6px;

}

#TreeList .mouseOver {

    background-color: #FAF3E2;

}

 

#TreeList .ParentNode {

    line-height: 21px;

    height: 21px;

    margin-top: 2px;

    clear: both;

}

 

#TreeList .ChildNode {

    background-image: url(../demoImgs/Sys_ModuleIcos.png);

    background-position: 15px -58px;

    padding-left: 39px;

    line-height: 21px;

    background-repeat: no-repeat;

    border-top-width: 0px;

    border-right-width: 0px;

    border-bottom-width: 1px;

    border-left-width: 0px;

    border-top-style: dashed;

    border-right-style: dashed;

    border-bottom-style: dashed;

    border-left-style: dashed;

    border-top-color: #aabdce;

    border-right-color: #aabdce;

    border-bottom-color: #aabdce;

    border-left-color: #aabdce;

    cursor: default;

    clear: both;
    height: 21px;

    color: #314f6a;

}

 

#TreeList .title {

    float: left;

}

#TreeList .input {

    font-size: 12px;

  	line-height: 18px;

    color: #FFF;

    height: 16px;

    background-color: #3F6B8F;

    width: 120px;

    text-align: center;

    margin-top: 1px;

    border-top-width: 1px;

    border-right-width: 1px;

    border-bottom-width: 1px;

    border-left-width: 1px;

    border-top-style: solid;

    border-right-style: solid;

    border-bottom-style: solid;

    border-left-style: solid;

    border-top-color: #1F3547;

    border-right-color: #FFF;

    border-bottom-color: #FFF;

    border-left-color: #1F3547;

    float: left;

}
#TreeList .editBT {
    float: left;
    overflow: visible;
}
#TreeList .editBT .ok {
    background-image: url(../demoImgs/Sys_ModuleIcos.png);
    background-repeat: no-repeat;
    background-position: 0px -89px;

    height: 13px;

    width: 12px;

    float: left;

    margin-left: 3px;

    padding: 0px;

    margin-top: 3px;

    cursor: pointer;

}

#TreeList .editBT .cannel {

    background-image: url(../demoImgs/Sys_ModuleIcos.png);

    background-repeat: no-repeat;

    background-position: 0px -120px;
    float: left;

    height: 13px;

    width: 12px;
    margin-left: 3px;
    padding: 0px;
    margin-top: 3px;
    cursor: pointer;
}
 
#TreeList .editArea {
    float: right;
    color: #C3C3C3;
    cursor: pointer;
    margin-right: 6px;
}
 
#TreeList .editArea span {
    margin: 2px;
}
 
#TreeList .editArea .mouseOver {
    color: #BD4B00;
    border-top-width: 1px;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-top-color: #C9925A;
    border-right-color: #E6CFBB;
    border-bottom-color: #E6CFBB;
    border-left-color: #C9925A;
    background-color: #FFFFFF;
    margin: 0px;
    padding: 1px;
}
 
#TreeList .ParentNode .title {
    color: #314f6a;
    cursor: pointer;
    background-image: url(../demoImgs/Sys_ModuleIcos.png);
    background-repeat: no-repeat;
    padding-left: 39px;
}
 
#TreeList .ParentNode.show .title {
    font-weight: bold;
    background-position: 3px -27px;
}
 
#TreeList .ParentNode.hidden .title {
    background-position: 3px 4px;
}
 
#TreeList .ParentNode .editArea {
    color: #999;    
}
#TreeList .ParentNode.show {
    background-color: #d1dfeb;
    border-top-width: 0px;
    border-right-width: 0px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-top-color: #5d7b96;
    border-right-color: #5d7b96;
    border-bottom-color: #5d7b96;
    border-left-color: #5d7b96;
}
 
#TreeList .ParentNode.hidden {
    border-top-width: 0px;
    border-right-width: 0px;
    border-bottom-width: 1px;
    border-left-width: 0px;
    border-top-style: dashed;
    border-right-style: dashed;
    border-bottom-style: dashed;
    border-left-style: dashed;
    border-top-color: #aabdce;
    border-right-color: #aabdce;
    border-bottom-color: #aabdce;
    border-left-color: #aabdce;
}
 
#TreeList .Row {
    clear: both;
    margin-left: 24px;
    background-image: url(../demoImgs/Sys_ModuleIcos2.png);
    background-repeat: repeat-y;
    background-position: 7px 0px;
}
</style>
<script src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    var TreeName = 'TreeList';//树状ID
    var PrentNodeClass = 'ParentNode';//父节点的标识
    var ChildNodeClass = 'ChildNode';//没有下级子节点的标识
    var ChildrenListClass = 'Row';//子节点被包着的外层样式
    var NewNodeName = '新建目录';//默认新建节点的名称
    var Orititle = 'Temptitle';//保存原来名称的属性名称
      
    var TModuleNode,TChildNode,TModuleNodeName;
    TModuleNode = $('#TreeList .'+PrentNodeClass);//顶层节点
    TChildNode = $('.'+ChildNodeClass);
    TModuleNodeName = $('#TreeList .' + PrentNodeClass + ' .title');//顶层节点名称
    TModuleNode.removeClass('show').addClass('hidden');
    if(TModuleNode.next().hasClass(ChildrenListClass)){
        TModuleNode.next().css('display','none');//紧跟的下一个是子节点
    }
      
    //========================编辑区域的HTML源码==============================
    function EditHTML(NewName){
      var str = '<div class="title">' + NewName + '</div>';
      str    += '<div class="editBT"></div>';
      str    += '<div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>';
      return str;
    }    
      
    //==========================树状展开收缩的效果============================
    TModuleNodeName.click(function(){
        TModuleNodeName_Click($(this));
    });
      
    //-------------------------------(定义)----------------------------------
    function TModuleNodeName_Click(Obj){
        if(Obj.has('input').length==0){//非编辑模式下进行
          var tempNode = Obj.parent();
          if(tempNode.hasClass('hidden')){
              tempNode.removeClass('hidden').addClass('show');
              if(tempNode.next().hasClass(ChildrenListClass)){
                tempNode.next().css('display','');
              }
          }
          else{
              tempNode.removeClass('show').addClass('hidden');
              if(tempNode.next().hasClass(ChildrenListClass)){
                  tempNode.next().css('display','none');
              }
          }
        }
	}    
    //==========================鼠标经过、离开节点的效果============================    
    with(TModuleNode){
      mouseover(function(){
        TNode_MouseOver($(this));   });
        
      mouseout(function(){
        TNode_MouseOut($(this));
      });
    }
      
    with(TChildNode){
      mouseover(function(){
        TNode_MouseOver($(this));
      });
    
      mouseout(function(){
        TNode_MouseOut($(this));
      });
    }
      
    //-------------------------------(定义)----------------------------------
    function TNode_MouseOver(Obj){
      if(!(Obj.hasClass('show'))){
          Obj.addClass('mouseOver');
      }
    }
      
    function TNode_MouseOut(Obj){
      Obj.removeClass('mouseOver');
    }
          
  //==========================编辑区操作============================    
    $('.editArea').each(function(){
        EditArea_Event($(this));
    });
    //-------------------------------(定义)----------------------------------
    function EditArea_Event(Obj){
        var objParent = Obj.parent();
        var objTitle = objParent.find('.title');//节点名称
       //-----------------编辑区的鼠标效果------------------ 
        Obj.children().each(function(){
          with($(this)){
              mouseover(function(){
                $(this).addClass('mouseOver');
              });
              mouseout(function(){
                $(this).removeClass('mouseOver');
              });
          }
        });
       //------------------------------------------------- 
        Obj.children().each(function(index, element) {

            $(this).click(function(){

              if($('#TreeList').has('input').length==0){

                switch(index){

                    case 0:    EditNode(objTitle,objTitle.html());break;//编辑

                    case 1:    AddNode(0,objParent,NewNodeRename(0,objTitle));break;//添加同级目录

                 case 2:    AddNode(1,objParent,NewNodeRename(1,objTitle));break;//添加下级目录

                    case 3:    DelNode(objParent);break;//删除

                }

              }

           else{

                alert('请先取消编辑状态！'); 

           }

            });

        });

    }
    //===============================验证编辑结果================================

    function CheckEdititon(pNode,text){

        var SameLevelTags    = new Array(PrentNodeClass,ChildNodeClass);

        var SameLevelTag    = '';

        for(var i=0;i<SameLevelTags.length;i++){

            if(pNode.parent().attr('class').indexOf(SameLevelTags[i]) > -1){

                SameLevelTag = SameLevelTags[i];

                break;

            }

        }

        if(SameLevelTag!=''){
          if(text!=''){
            //---------------- 根据节点样式遍历同级节点 --------------------
            var IsExsit = false;
            pNode.parent().parent().children('div').children('.title').each(function(){
                if(pNode.find('input').val()==$(this).html()){
                    IsExsit = true;
                    alert('抱歉！同级已有相同名称！');
                    return false;
                }
            });
           	 return !IsExsit;
      		}
            
          else{
              alert('不能为空!');
              return false;
      		}
        }
    }
      
    //=================================自动命名================================
    function NewNodeRename(tag,pNode){
        //---------------- 根据节点样式遍历同级节点 --------------------
        var MaxNum = 0;
        var TObj;
        if(tag==0){//添加同级目录
            if(pNode.attr('id')==TreeName){
                TObj = pNode.children('div').children('.title');
            }
            else{
                TObj = pNode.parent().parent().children('div').children('.title');
            }
        }
        else{//添加下级目录
            if(pNode.parent().next().html()!=null){//原来已有子节点
                TObj = pNode.parent().next().children('div').children('.title');
            }
            else{//没有子节点
                TObj = null;
            }
        }
          
        if(TObj){
          TObj.each(function(){
              var CurrStr = $(this).html();
              var temp;
              if(CurrStr.indexOf(NewNodeName)>-1){
                  temp = parseInt(CurrStr.replace(NewNodeName,''));
                  if(!isNaN(temp)){
                      if(!(temp<MaxNum)){
                          MaxNum = temp + 1;
                      }
                  }
                  else{
                    MaxNum = 1;  
                  }
              }
          });
        }
          
        var TempNewNodeName = NewNodeName;
        if(MaxNum>0){
            TempNewNodeName    += MaxNum;
        }
        return TempNewNodeName;
    }
      
    //=============================== 编辑定义 ================================
    function EditNode(obj,text){
        obj.attr(Orititle,text);//将原来的text保存到Orititle中
        obj.html("<input type='text' class=input value=" + text + ">");//切换成编辑模式
        obj.parent().find('.editBT').html("<div class=ok title=确定></div><div class=cannel title=取消></div>");
        obj.has('input').children().first().focusEnd();//聚焦到编辑框内
    
        obj.parent().find('.ok').click(function(){
            Edit_OK(obj);
        });
          
        obj.parent().find('.cannel').click(function(){
            Edit_Cannel(obj);
        });
    }
      
    //=============================== 添加节点 ================================
    function AddNode(tag,obj,NameStr){
        if(tag==0 || tag==1){
          var newNode = $('<div class=' + ChildNodeClass + '></div>');
          if(tag==0){//添加同级目录
            newNode.appendTo(obj.parent());
          }
          else{//添加下级目录
            if(!(obj.next()) || (obj.next().attr('class')!=ChildrenListClass)){//最后一个节点和class!=ChildrenListClass都表示没有子节点
                var ChildrenList = $('<div class=' + ChildrenListClass + '></div>');
                ChildrenList.insertAfter(obj);//将子节点的”外壳“加入到对象后面
                newNode.appendTo(ChildrenList);//将子节点加入到”外壳“内
            }
            else{
                newNode.appendTo(obj.next());//将子节点加入到”外壳“内
            }
            obj.attr('class',PrentNodeClass + ' show');//激活父节点展开状态模式
            obj.next().css('display','');//展开子节点列表
          }
            
          with(newNode){
              html(EditHTML(NameStr));
              //---------------------------------动态添加事件-------------------------------
              mouseover(function(){
                TNode_MouseOver($(this));
              });
                
              mouseout(function(){             
              	TNode_MouseOut($(this));
              });
                
              find('.title').click(function(){
                  TModuleNodeName_Click($(this));
              });
                
              find('.editArea').each(function(){
                  EditArea_Event($(this));
              });
              //---------------------------------------------------------------------------
          }
          EditNode(newNode.find('.title'),newNode.find('.title').html());//添加后自动切换到编辑状态
        }
    }
      
    //=============================== [删除]按钮 ================================
    function DelNode(obj){
        if(confirm('确定要删除吗？')){
            var objParent = obj.parent();
            var objChildren = obj.next('.Row');
            obj.remove();//基于Jquery是利用析构函数，所以“删除”后其相关属性仍然存在，除非针对ID来操作就可以彻底删除
            objChildren.remove();//删除对象所有子节点
            ChangeParent(objParent);
        }
    }
      
    //=============================== 编辑[确定]按钮 ================================
    function Edit_OK(obj){
        var tempText = obj.has('input').children().first().val();
          
        if(CheckEdititon(obj,tempText)){
          obj.html(tempText);
        }
        else{
          obj.html(obj.attr(Orititle));  
        }
        obj.removeAttr(Orititle);
        obj.parent().find('.editBT').html('');
    }
      
    //=============================== 编辑[取消]按钮 ================================
    function Edit_Cannel(obj){
        obj.html(obj.attr(Orititle));
        obj.removeAttr(Orititle);
        obj.parent().find('.editBT').html('');
    }
      
    //=============================== 改变父节点样式 ================================
    function ChangeParent(obj){
        if(obj.find('.ChildNode').length==0){
        	//没有子节点
            obj.prev('.'+PrentNodeClass).attr('class',ChildNodeClass);
            obj.remove();
        }
    }     

    //=============================== 设置聚焦并使光标设置在文字最后 ================================

    $.fn.setCursorPosition = function(position){  

        if(this.lengh == 0) return this;  

        return $(this).setSelection(position, position);  

    }  

        

    $.fn.setSelection = function(selectionStart, selectionEnd) {  
        if(this.lengh == 0) return this;  
        input = this[0];
        if (input.createTextRange) {

            var range = input.createTextRange();  

            range.collapse(true); 

            range.moveEnd('character', selectionEnd);  

            range.moveStart('character', selectionStart);  
            range.select(); 
        } else if (input.setSelectionRange) {  
            input.focus(); 
            input.setSelectionRange(selectionStart, selectionEnd);  
        }  
        return this;  
    }       
    $.fn.focusEnd = function(){
        this.setCursorPosition(this.val().length);  
    }      
});
</script>
<div id="GoogleAD"></div>
<div id="TreeList">
	<div class="ParentNode hidden">
      <div class="title"></div>
      <div class="editBT"></div>
      <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
    </div>
    <div class="Row">
      <div class="ParentNode">
        <div class="title">综合设计</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="Row">
        <div class="ChildNode">
          <div class="title">Arting365</div>
          <div class="editBT">
          	
        </div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
        </div>
        <div class="ChildNode">
          <div class="title">视觉中国</div>
          <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
        </div>
        <div class="ChildNode">
          <div class="title">蓝色理想</div>
          <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
        </div>
        <div class="ChildNode">
          <div class="title">网页设计师联盟</div>
          <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
        </div>
        <div class="ChildNode">
          <div class="title">创意在线</div>
          <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
        </div>
        <div class="ChildNode">
          <div class="title">视觉同盟</div>
          <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
        </div>
      </div>
      <div class="ParentNode hidden">
        <div class="title">平面设计</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="Row">
        <div class="ChildNode">
          <div class="title">优艾网</div>
          <div class="editBT"></div>
          <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
        </div>
        <div class="ChildNode">
          <div class="title">中国设计网</div>
          <div class="editBT"></div>
          <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
        </div>
        <div class="ChildNode">
          <div class="title">设计酷</div>
          <div class="editBT"></div>
          <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
        </div>
        <div class="ChildNode">
          <div class="title">平面设计在线</div>
          <div class="editBT"></div>
          <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
        </div>
      </div>
    </div>
    <div class="ParentNode show">
      <div class="title">酷站欣赏</div>
      <div class="editBT"></div>
      <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
    </div>
    <div class="Row">
      <div class="ChildNode">
        <div class="title">欧美酷站</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">日韩酷站</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">国内酷站</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">婚庆摄影</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">餐饮食品</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
    </div>
    <div class="ParentNode show">
      <div class="title">设计欣赏</div>
      <div class="editBT"></div>
      <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
    </div>
    <div class="Row">
      <div class="ChildNode">
        <div class="title">网页设计</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">UI设计</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">VI设计</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">Logo设计</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">广告设计</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">摄影艺术</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">工艺设计</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
    </div>
    <div class="ParentNode show">
      <div class="title">设计交流</div>
      <div class="editBT"></div>
      <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
    </div>
    <div class="Row">
      <div class="ChildNode">
        <div class="title">设计理念</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">Photoshop教程</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">Flash教程</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">HTML/CSS教程</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">JS/Jquery教程</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
      <div class="ChildNode">
        <div class="title">SEO及建站推广</div>
        <div class="editBT"></div>
        <div class="editArea"><span>[编辑]</span><span>[添加同级目录]</span><span>[添加下级目录]</span><span>[删除]</span></div>
      </div>
    </div>
</div>
