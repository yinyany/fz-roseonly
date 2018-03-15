@extends('layouts.admin.masterAdmin')
@section('title', '订单详情')

@section('link')
  
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/order') }}">订单管理</a>
        <a>
          <cite>订单详情</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    @include('flash::message')

    <div class="x-body">
      <form class="layui-form" action='{{ url("admin/order/update/$orderinfo->id") }}' method="post">
          {{csrf_field()}}

        
          <input type="hidden" name="ship_time" value="{{ $orderinfo->ship_time ? $orderinfo->ship_time : time() }}" >
          <input type="hidden" name="ship_number" value="{{ $orderinfo->ship_number ? $orderinfo->ship_number : rand(10,50).date('YmdHis').rand(10000,20000)}}">

        <div class="layui-form-item">
          <label class="layui-form-label" style="font-size: 18px;">订单号：</label>
          <div class="layui-input-block"> 
            <input type="text" name="order_number" value="{{$orderinfo->order_number}}" autocomplete="off" class="layui-input" style="width:180px;border:none;font-size:20px;color:#f00;" disabled>
          </div>
        </div>
        <hr>
        <div style="padding-top:10px;">
          <h1 style="font-size: 22px;">收货人信息</h1>
           <table class="layui-table" lay-even>
              <tr>
                <td style="width:100px;">收货人姓名：</td>
                <td>{{ $minfo['name']}}</td>
              </tr>
              <tr>
                <td>收货人地址：</td>
                <td></td>
              </tr>
              <tr>
                <td>收货人电话：</td>
                <td></td>
              </tr>
              <tr>
                <td>电子邮件：</td>
                <td></td>
              </tr>
          </table>
        </div>
         
        <div  style="padding-top:10px;">
          <h1 style="font-size: 22px;">订单信息</h1>
          <table class="layui-table" lay-even>
              <tr>
                <td style="width:100px;">订单编号：</td>
                <td></td>
              </tr>
              <tr>
                <td>下单时间：</td>
                <td>{{$orderinfo->is_pay}}</td>
              </tr>
          </table>
        </div>
          
        <div  style="padding-top:10px;">
          <h1 style="font-size: 22px;">商品信息</h1>
            <table class="layui-table" lay-even>
              <colgroup>
                <col width="150">
                <col width="200">
                <col width="500">
                <col width="150">
                <col width="150">
              </colgroup>
              <thead >
                <tr >
                  <th>商品图片</th>
                  <th>品牌</th>
                  <th>商品名称</th>
                  <th>购买数量</th>
                  <th>商品单价</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  <td style="height:100px"><img src="" style="width: 200px;"></td>
                  <td>的撒发达</td>
                  <td>阿斯顿发士大夫撒旦飞洒地方撒地方撒旦法师打发撒旦法的萨芬</td>
                  <td>21</td>
                  <td>21333</td>
                </tr>
                <tr>
                  <td style="height:100px"><img src=""></td>
                  <td>的撒发达</td>
                  <td>阿斯顿发士大夫撒旦飞洒地方撒地方撒旦法师打发撒旦法的萨芬</td>
                  <td>21</td>
                  <td>21333</td>
                </tr>
              </tbody>
            </table>
        </div>  
          
        <div class="layui-form-item">
          <label class="layui-form-label"><span class="x-red">*</span>交易金额：</label>
          <div class="layui-input-block"> 
            <input type="text" name="pay_prices" value="￥{{$orderinfo->pay_prices}}" autocomplete="off" class="layui-input" style="border:none;font-size:20px;color:#f00;" disabled>
          </div>
          <label class="layui-form-label">
            <span class="x-red">*</span>状态：
          </label>
          <div class="layui-input-inline">
            <select name="is_ship" lay-verify="">
              <option value="1"
                @if($orderinfo->is_ship === 1)
                  selected
                @endif
               >已发货</option>
            @if($orderinfo->is_ship !== 1)
              <option value="0" 
               @if($orderinfo->is_ship === 0)
                  selected
                @endif
              >未发货</option>
            @endif
            </select> 
      
          </div>
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                 @if($orderinfo->is_ship === 0) 提交 @else 返回 @endif

              </button>  
        </div>
        


      </form>

    </div>
@endsection

@section('js')
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
        });
    </script>
@endsection 
