<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        $id = $this->route('user');
        return [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'between:8,30'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '姓名必须填写',
            'name.min' => '姓名最小不能小于两字符',
            'email.required' => '登录邮箱必须填写',
            'email.email' => '请填写合法的邮箱',
            'email.unique' => '登录邮箱必须唯一',
            'password.between' => '请填写8-30位的密码'
        ];
    }
}
