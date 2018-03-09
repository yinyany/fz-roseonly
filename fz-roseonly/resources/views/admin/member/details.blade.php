@extends('layouts.admin.masterAdmin')
@section('title', '用户管理')

@section('link')
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/member') }}">会员管理</a>
        <a>
          <cite>个人信息</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    @include('flash::message')

    <div class="x-body">
      <table  class="layui-table">
        <colgroup>
          <col width="300">
          <col>
        </colgroup>
        <tbody>
            <tr>
                <th>用户名:</th>
                <td>{{ $model->name }}</td>
            </tr>
            <tr>
                <th>手机号:</th>
                <td>{{ $model->phone }}</td>
            </tr>
            <tr>
                <th>性别:</th>
                <td>{{ $model->sex }}</td>
            </tr>
            <tr>
                <th>生日:</th>
                <td>{{ $model->birthday }}</td>
            </tr>
            <tr>
                <th>情感状态:</th>
                <td>{{ $model->affective }}</td>
            </tr>
            <tr>
                <th>家庭地址(默认收货地址):</th>
                <td>{{ $model->address }}</td>
            </tr>
            <tr>
                <th>邮箱:</th>
                <td>{{ $model->email }}</td>
            </tr>
            <tr>
                <th>爱人姓名:</th>
                <td>{{ $model->fere }}</td>
            </tr>
            <tr>
                <th>爱人电话:</th>
                <td>{{ $model->fere_phone }}</td>
            </tr>
        </tbody>
      </table>
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
    </script>
@endsection 
