@extends('layouts.backend.backend')
@section('title','用户添加')
@section('content')
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{route('user.add')}}">用户管理</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>用户添加</span>
                </li>
            </ul>
        </div>
        <div class="row">
            @include('common.message')
            <div class="portlet-body form">
                @include('common.error')
                <form role="form" method="post" action="{{route('user.store')}}">
                    {{csrf_field()}}
                    <div class="form-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">用户名</label>
                            <div class="input-group">
                                <input type="username" name="username" class="form-control" id="exampleInputPassword1" placeholder="至少2位">
                                <span class="input-group-addon">
                                                <i class="fa fa-user font-red"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">邮箱</label>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="请输入正确邮箱">
                                <span class="input-group-addon">
                                                <i class="fa fa-user font-red"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">密码</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="8-30位数字字母下划线">
                                <span class="input-group-addon">
                                                <i class="fa fa-user font-red"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile1">用户头像</label>
                            <input type="file" name="user_pic" id="exampleInputFile1">
                            <p class="help-block"> 请上传至少图像. </p>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue">确定</button>
                        <button type="reset" class="btn default">重置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection