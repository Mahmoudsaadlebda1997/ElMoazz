<?php

namespace Modules\AdminModule\Services\Admin;

use Illuminate\Validation\Rule;
use Modules\AdminModule\Entities\Admin;
use Modules\CommonModule\Entities\ResetPassword;

trait AdminServiceHelper{

    function validationLogin($data){
        return validator($data,[
            'username' => 'required',
            'password' => 'required|min:12',
        ]);
    }
    function validationUpdatePassword($data){
        return validator($data,[
            'old_password'=>'required|min:12',
            'id'=>'required|exists:admins,id',
            'password'=>'required|min:12|confirmed'
        ]);
    }
    function validationCreate($data){
        return validator($data,[
            'name'=>'required',
            'username' => 'required|alpha_num|unique:admins,username',
            'password' =>'required|min:12|confirmed',
            'role_id' => 'required|exists:roles,id',
            'email' => 'required|email|unique:admins,email,id',
            'phone' => 'required|numeric|digits:11|unique:admins,phone',
            'image' => 'nullable|image',
            'type' => 'exists:roles,title'
        ]);
    }
    function validationUpdate($data){
        return validator($data,[
            'id'=>'required|exists:admins,id',
            'name'=>'required',
            'username' => 'required|alpha_num|alpha_num|unique:admins,username,'.$data['id'],
            'password' =>'nullable|min:12|confirmed',
            'role_id' => 'required|exists:roles,id',
            'email' => ['required', 'email', Rule::unique('admins')->ignore($data['id'])],
            'phone' => ['nullable','numeric','digits:12', Rule::unique('admins','phone')->ignore($data['id'])],
            'image' => 'nullable|image',
            'type' => 'exists:roles,title'
        ]);
    }
    protected  function validationForgetPassword($data){
        return validator($data,[
            'email' => 'required|email|exists:admins,email',
        ]);
    }
    protected  function validationResetPassword($data){
        return validator($data,[
            'token' => 'required',
            'password' => 'required|min:12|confirmed',
        ]);
    }

}
