@extends('layouts.admin.masterAdmin')
@section('title', '库存管理')

@section('link')
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/stock') }}">库存管理</a>
        <a>
          <cite>库存列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="{{ url('/admin/stock') }}" method="get">
          <input type="text" name="good_id"  placeholder="请输入商品名" autocomplete="off" class="layui-input" value="{{$keywords?$keywords:''}}">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>

      <xblock>
        <a class="layui-btn" style="text-decoration: none;color: white;" href='{{ url("admin/stock/create") }}'><i class="layui-icon"></i>添加</a>
        <a class="layui-btn" href="javascript:;" style="text-decoration: none;float: right;">共有数据：{{$count}} 条</a>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>商品名</th>
            <th>属性名</th>
            <th>属性值</th>
            <th>商品价格</th>
            <th>商品库存</th>
            <th>添加时间</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($stock as $list)
          <tr>
            <td>{{ $list->id }}</td>
            <td>{{ $datas[$list->good_id] }}</td>
            <td>{{ $attrs[$list->bid] }}</td>
            <td>{{ $vvs[$list->vid] }}</td>
            <td>{{ $list->price }}</td>
            <td>{{ $list->stock }}</td> 
            <td>{{ $list->created_at }}</td>
            <td class="td-manage">
              <a title="修改状态" href='{{ url("admin/stock/edit/$list->id") }}'>
                <i class="layui-icon" style="font-size: 25px; color: #1E9FFF;">&#xe642;</i>
              </a>
              <a title="删除" href='{{ url("admin/stock/destroy/$list->id") }}'>
                <i class="layui-icon" style="font-size: 25px; color: #1E9FFF;">&#xe640;</i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {!! $stock->appends(['name' => $keywords])->render() !!}
    </div>
    @include('flash::message')
@endsection

    

