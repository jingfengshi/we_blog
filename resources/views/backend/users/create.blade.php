@extends('layouts.backend.backend')
@section('title','用户添加')
@section('content')
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{route('user.index')}}">用户管理</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    @if(isset($user))
                        <span>用户编辑</span>
                    @else
                        <span>用户添加</span>
                    @endif

                </li>
            </ul>
        </div>
        <div class="row">
            @include('common.message')
            <div class="portlet-body form">
                @include('common.error')

                @if(isset($user))
                    <form action="{{ route('user.update', $user['id']) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @else
                            <form role="form" method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
                                @endif

                    {{csrf_field()}}
                    <div class="form-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">用户名</label>
                            <div class="input-group">
                                <input type="username" name="name" class="form-control" id="exampleInputPassword1" placeholder="至少2位" value="{{ old('name',isset($user)?$user['name']:'') }}">
                                <span class="input-group-addon">
                                                <i class="fa fa-user font-red"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">邮箱</label>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="请输入正确邮箱" value="{{ old('email', isset($user)?$user['email']:'' ) }}">
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
                            <p class="help-block"> 图片不能大于2M. </p>
                        </div>
                        @if(isset($user))
                        <div class="form-group">

                                    <img src="{{ asset('uploads/avatar') }}/{{ $user->user_pic }}" class="img-circle" style="width:80px;height:auto;">

                        </div>
                        @endif
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