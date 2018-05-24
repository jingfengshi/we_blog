<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\CreateRequest;
use App\Repositories\UserRepositoryEloquent;
use App\Services\ImageUploads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    protected $user;

    /**
     * UserController constructor.
     * @param UserRepositoryEloquent $user
     */
    public function __construct(UserRepositoryEloquent $user)
    {
        $this->user = $user;
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(CreateRequest $request, ImageUploads $imageUploads)
    {
        if ($request->hasFile('user_pic')) {
            $file = $request->file('user_pic');

            $upload = $imageUploads->uploadAvatar($file);
            if (!$upload['status']) {
                return redirect()->back()->withErrors($upload['msg']);
            }
        }

        $avatarFileName = isset($upload['fileName']) ? $upload['fileName'] : '';

        if ($this->user->store($request->all(), $avatarFileName)) {
            return redirect('backend/user')->with('success', '用户添加成功');
        }

        return redirect()->back()->withErrors('系统异常，用户添加失败');
    }
}
