@extends('layouts.admin.masterAdmin')
@section('title', '管理员管理')

@section('link')
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('admin/comment') }}">评论管理</a>
        <a>
          <cite>评论列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="{{ url('/admin/comment') }}" method="get">
          <input type="text" name="name"  placeholder="请输入商品名称" autocomplete="off" class="layui-input" value="{{$keywords?$keywords:''}}">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <a class="layui-btn" href="javascript:;">共有数据：{{ $sum }} 条</a>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>商品名称</th>
            <th>评论内容</th>
            <th>评论时间</th>
            <th>回复内容</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($comment as $list)
          <tr>
            <td>{{ $list->id }}</td>
            <td>{{ $list->mid }}</td>
            <td>{{ $list->sid }}</td>
            <td>
              <a class="layui-bg-blue" href="javascript:;">评论:</a>{{ $list->content }}
            </td>
            <td>{{ $list->created_at }}</td>
            <td>
                <a class="layui-bg-orange" href="javascript:;">回复:</a>{{ $list->reply }}
            </td>
            <td class="td-manage">
              <a title="回复评论" href='{{ url("admin/comment/edit/$list->id") }}'>
                <i class="layui-icon" style="font-size: 25px; color: #1E9FFF;">&#xe642;</i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {!! $comment->appends(['name' => $keywords])->render() !!}
    </div>
    @include('flash::message')
@endsection

    

