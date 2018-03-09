@extends('layouts.admin.masterAdmin')
@section('title', '管理员管理')

@section('link')
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/role') }}">角色管理</a>
        <a>
          <cite>分配权限</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    @include('flash::message')

    <div class="x-body">
      <form action='{{ url("admin/role/update/$role->id") }}' method="post" class="layui-form layui-form-pane">
        {{csrf_field()}}
        <div class="layui-form-item">
            <label for="name" class="layui-form-label">
                <span class="x-red">*</span>角色名
            </label>
            <div class="layui-input-inline">
                <input type="text" name="display_name" class="layui-input" value="{{ $role->display_name }}" disabled>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">
                拥有权限
            </label>
            <table  class="layui-table layui-input-block">
                <tbody>
                    <tr>
                        <td>
                            <div class="layui-input-block">
                                @foreach($pers as $per)
                                    <input name="pid[]" type="checkbox" 
                                        @foreach($role->perms as $checkperm) 
                                            @if($checkperm['id'] == $per['id']) 
                                                checked 
                                            @endif  
                                        @endforeach 
                                    value="{{ $per->id }}"> {{ $per->display_name }} 
                                @endforeach
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="desc" class="layui-form-label">
                描述
            </label>
            <div class="layui-input-block">
                <textarea name="description" class="layui-textarea">{{ $role->description }}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
        <button class="layui-btn" lay-submit="" lay-filter="add">提交</button>
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
    </script>
@endsection 
