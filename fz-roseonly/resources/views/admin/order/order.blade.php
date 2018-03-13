@extends('layouts.admin.masterAdmin')
@section('title', '订单管理')

@section('link')
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/order') }}">订单管理</a>
        <a>
          <cite>订单列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
      </div>

      <xblock>
        <a class="layui-btn" href="javascript:;">共有数据：{{ $sum }} 条</a>
        <!-- <span class="x-right" style="line-height:40px"> 共有数据：{{ $sum }} 条</span> -->
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>订单号</th>
            <th>交易金额</th>
            <th>交易时间</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($order as $list)
          <tr>
            <td>{{ $list->id }}</td>
            <th>{{$list->order_number}}</th>
            <td>{{ $list->pay_prices }}</td>
            <td>{{ $list->pay_time }}</td>
            <td class="td-status">
              @if($list->is_ship === 1)
                <span class="layui-btn layui-btn-normal layui-btn-mini">已发货</span>
              @elseif($list->is_ship === 0)
                <span class="layui-btn layui-btn-danger layui-btn-mini">未发货</span>
              @endif
            </td>
            <td class="td-manage">
              <a title="订单详情" href='{{ url("admin/order/edit/$list->id") }}' alt="订单详情">
                <i class="layui-icon" style="font-size: 25px; color: #1E9FFF;">&#xe63c;</i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @include('flash::message')
@endsection

    

