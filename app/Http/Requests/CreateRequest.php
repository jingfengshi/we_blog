<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:8,30'
        ];
    }


    public function messages()
    {
        return [
            'username.required' => '姓名必须填写',
            'username.min' => '姓名最小不能小于两字符',
            'email.required' => '登录邮箱必须填写',
            'email.email' => '请填写合法的邮箱',
            'email.unique' => '登录邮箱必须唯一',
            'password.required' => '请填写登录密码',
            'password.between' => '请填写8-30位的密码'
        ];
    }
}
