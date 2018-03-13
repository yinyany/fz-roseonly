@extends('layouts.admin.masterAdmin')
@section('title', '管理员管理')

@section('link')
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
@endsection 


@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="{{ url('/admin/welcome') }}">首页</a>
        <a href="{{ url('/admin/user') }}">管理员管理</a>
        <a>
          <cite>分配角色</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    @include('flash::message')

    <div class="x-body">
      <form action='{{ url("admin/user/update/$user->id") }}' method="post" class="layui-form layui-form-pane">
        {{csrf_field()}}
        <div class="layui-form-item">
            <label for="name" class="layui-form-label">
                <span class="x-red">*</span>管理员
            </label>
            <div class="layui-input-inline">
                <input type="text" name="name" class="layui-input" value="{{ $user->name }}" disabled>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">
                角色列表
            </label>
            <table  class="layui-table layui-input-block">
                <tbody>
                    <tr>
                        <td>
                            <div class="layui-input-block">
                                @foreach($role as $list)
                                    <input name="rid[]" type="checkbox" 
                                        @foreach($user->roles as $checklist) 
                                            @if($checklist['id'] == $list['id']) 
                                                checked 
                                            @endif  
                                        @endforeach 
                                    value="{{ $list->id }}"> {{ $list->display_name }} 
                                @endforeach
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
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
