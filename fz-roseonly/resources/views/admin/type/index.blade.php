@extends('layouts.admin.masterAdmin')
@section('title', '分类管理')

@section('link')
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/type') }}">分类列表</a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="{{ url('/admin/type') }}" method="get">
          <input type="text" name="name"  placeholder="请输入关键字" autocomplete="off" class="layui-input" value="{{$keywords?$keywords:''}}">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>

      <xblock>
        
        <a class="layui-btn" style="text-decoration: none;color: white;" href="{{ url('admin/type/create') }}"><i class="layui-icon"></i>添加主类</a>
        <a class="layui-btn" href="javascript:;" style="text-decoration: none;float: right;">共有数据：{{$count}} 条</a>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>父类</th>
            <th>类名</th>
            <th>添加时间</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($type as $list)
          <tr>
            <td>{{ $list->id }}</td>
            <td>  
                {{ $datas[$list->parent_id]}}
              
            </td> 
            <td>{{ $list->name }}</td>
            <td>{{ $list->created_at }}</td>
            <td class="td-manage">
              <a title="添加子类" href="{{ url('admin/type/create').'?id='.$list->id }}">
                <i class="layui-icon">&#xe654;</i>
              </a>
              <a title="修改" href='{{ url("admin/type/edit/$list->id") }}'>
                <i class="layui-icon">&#xe642;</i>
              </a>
              <a title="删除" href='{{ url("admin/type/destroy/$list->id") }}'>
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {!! $type->appends(['id' => $keywords])->render() !!}
    @include('flash::message')
    
@endsection

    

