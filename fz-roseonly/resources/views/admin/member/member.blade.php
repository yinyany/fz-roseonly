@extends('layouts.admin.masterAdmin')
@section('title', '用户管理')

@section('link')
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/member') }}">会员管理</a>
        <a>
          <cite>会员列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <a class="layui-btn" href="{{ url('admin/member/create') }}"><i class="layui-icon"></i>添加</a>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>手机</th>
            <th>性别</th>
            <th>生日</th>
            <th>婚姻状况</th>
            <th>家庭地址</th>
            <th>邮箱</th>
            <th>爱人姓名</th>
            <th>爱人电话</th>
            <th>注册时间</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($member as $list)
          <tr>
            <td>{{ $list->id }}</td>
            <td>{{ $list->name }}</td>
            <td>{{ $list->phone }}</td>
            <td>{{ $list->sex }}</td>
            <td>{{ $list->birthday }}</td>
            <td>{{ $list->affective }}</td>
            <td>{{ $list->address }}</td>
            <td>{{ $list->email }}</td>
            <td>{{ $list->fere }}</td>
            <td>{{ $list->fere_phone }}</td>
            <td>{{ $list->created_at }}</td>
            <td class="td-manage">
              <a title="编辑"  onclick="x_admin_show('编辑','admin-edit.html')" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
              <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {!! $member->render() !!}
    </div>
@endsection

@section('js')
   <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });
    </script>
@endsection 
