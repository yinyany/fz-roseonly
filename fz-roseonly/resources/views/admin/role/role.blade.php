@extends('layouts.admin.masterAdmin')
@section('title', '管理员管理')

@section('link')
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('admin/role') }}">角色管理</a>
        <a>
          <cite>角色列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="{{ url('/admin/role') }}" method="get">
          <input type="text" name="name"  placeholder="请输入权限名称" autocomplete="off" class="layui-input" value="{{$keywords?$keywords:''}}">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>

      <xblock>
        <a class="layui-btn" href="{{ url('admin/role/create') }}"><i class="layui-icon"></i>添加</a>
        <a class="x-right layui-btn" href="javascript:;">共有数据：{{ $sum }} 条</a>
        <!-- <span class="x-right" style="line-height:40px"> 共有数据：{{ $sum }} 条</span> -->
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>角色名称</th>
            <th>拥有权限规则</th>
            <th>描述</th>
            <th>创建时间</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($roles as $list)
          <tr>
            <td>{{ $list->id }}</td>
            <td>{{ $list->name }}</td>
            <td>{{ $list->display_name }}</td>
            <td>{{ $list->description }}</td>
            <td>{{ $list->created_at }}</td>
            <td class="td-manage">
              <a title="分配权限" href='{{ url("admin/role/edit/$list->id") }}'>
                <i class="layui-icon" style="font-size: 25px; color: #1E9FFF;">&#xe642;</i>
              </a>
              <a title="修改角色" href='{{ url("admin/role/data/$list->id") }}'>
                <i class="layui-icon" style="font-size: 25px; color: #1E9FFF;">&#xe620;</i>
              </a>
              <a title="删除" href='{{ url("admin/role/destroy/$list->id") }}'>
                <i class="layui-icon" style="font-size: 25px; color: #1E9FFF;">&#xe640;</i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {!! $roles->appends(['name' => $keywords])->render() !!}
    </div>
    @include('flash::message')
@endsection

    

