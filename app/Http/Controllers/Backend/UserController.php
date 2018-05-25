<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use App\Repositories\UserRepositoryEloquent;
use App\Services\ImageUploads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

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

    public function index()
    {
        $users = $this->user->all(['id', 'name', 'email', 'user_pic'])->toArray();
        return view('backend.users.index', compact('users'));
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


    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('backend.users.create', compact('user'));
    }

    public function update(UpdateRequest $request, $id, ImageUploads $imageUploads)
    {
        $user = $this->user->find($id);

        if ($request->hasFile('user_pic')) {
            $file = $request->file('user_pic');

            $upload = $imageUploads->uploadAvatar($file);

            if (!$upload['status']) {
                return redirect()->back()->withErrors($upload['msg']);
            }
        }

        $avatarFileName = isset($upload['fileName']) ? $upload['fileName'] : '';

        if ($this->user->update($request->all(), $id, $avatarFileName)) {
            if ($avatarFileName != "" && $user['user_pic'] != "") {
                Storage::disk('upload')->delete('avatar/' . $user['user_pic']);
            }

            return redirect('backend/user')->with('success',' 用户修改成功');
        }

        return redirect()->back()->withErrors('用户修改失败');
    }


    public function delete($id)
    {
        if($this->user->delete($id)){
            return redirect('backend/user')->with('success',' 用户删除成功');
        }

        return redirect()->back()->withErrors('用户删除失败');
    }
}
