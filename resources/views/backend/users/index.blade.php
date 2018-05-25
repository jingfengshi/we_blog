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
                    <span>用户列表</span>
                </li>
            </ul>
        </div>
        <div class="row">
            @include('common.message')
            <div class="portlet">
                <div class="portlet-title">

                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label id="add_user" class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" >新增用户</label>

                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th>
                                    序号
                                </th>
                                <th class="hidden-xs">
                                     头像
                                </th>
                                <th>
                                    用户名
                                </th>
                                <th>
                                    邮箱
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>
                                    {{$user['id']}}
                                </td>
                                <td class="highlight">

                                    <img src="{{asset('uploads/avatar')}}/{{$user['user_pic']}}" class="img-circle" style="width:30px;height:auto;"/>
                                </td>
                                <td class="hidden-xs"> {{$user['name']}} </td>
                                <td> {{$user['email']}} </td>
                                <td>
                                    <a href="{{route('user.edit',['user'=>$user['id']])}}" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-edit"></i>修改
                                    </a>
                                    <form action="{{route('user.delete',['id'=>$user['id']])}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-outline btn-circle dark btn-sm black"> <i class="fa fa-trash-o"></i>删除</button>

                                    </form>

                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4">暂无数据</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">删除用户</h4>
                </div>
                <div class="modal-body">确定要删除此用户么</div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">取消</button>
                    <button type="button" id="comfirm" class="btn green">确认</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
           $('#add_user').on('click',function(){
               window.location.href='{{route('user.add')}}';
           })
        });
    </script>
@stop