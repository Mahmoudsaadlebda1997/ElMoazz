<?php

namespace Modules\AdminModule\Services\Admin;

use Modules\AdminModule\Entities\Admin;

trait AdminServiceHelper{

    function validationLogin($data){
         return validator($data,[
             'username'=> 'required',
             'password' =>'requried|min:12'
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
        $types = implode(',',collect(Admin::ADMIN_TYPES)->values()->toArray());

        return validator($data,[
            'name'=>'required',
            'username' => 'required|alpha_num|unique:admins,username',
            'password' =>'required|min:12|confirmed',
            'role_id' => 'required|exists:roles,id',
            'email' => 'required|email|unique:admins,email,id',
            'phone' => 'required|numeric|digits:11,unique:admins,phone',
            'image' => 'nullable|image',
            'type' => "required|in:$types"
        ]);
    }
    function validationUpdate($data){
        $types = implode(',',collect(Admin::ADMIN_TYPES)->values()->toArray());

        return validator($data,[
            'id'=>'required|exists:admins,id',
            'name'=>'required',
            'username' => 'required|alpha_num|unique:admins,username',
            'password' =>'required|min:12|confirmed',
            'role_id' => 'required|exists:roles,id',
            'email' => 'required|email|unique:admins,email,id',
            'phone' => 'required|numeric|digits:11,unique:admins,phone',
            'image' => 'nullable|image',
            'type' => "required|in:$types"
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
    public function forgetPassword(array $data)
    {
        $validation = $this->validationForgetPassword($data);
        if ($validation->fails()){
            return return_msg(false,'Validation Errors',[
                'validation_errors' => $validation->getMessageBag()->getMessages(),
            ]);
        }
        $token = strtoupper(uniqid());
        ResetPassword::where('identifier',$data['email'])->delete();

        ResetPassword::create(['identifier' => $data['email'] , 'token' => $token]);

        $url = route('getResetPasswordSite',['token' => $token]);

        send_email([
            'to' => $data['email'],
            'content' => ['url' => $url],
            'subject' => "Reset Password",
            'template' => 'mails.reset_password',
        ]);
        return  return_msg(true,'Success');


    }
    public function resetPassword(array $data)
    {
        $validation = $this->validationResetPassword($data);
        if ($validation->fails()){
            return return_msg(false,'Validation Errors',[
                'validation_errors' => $validation->getMessageBag()->getMessages(),
            ]);
        }

        $reset = ResetPassword::where('token',$data['token'])->first();

        if (!$reset){
            return return_msg(false,'Validation Errors',[
                'validation_errors' => [
                    'password'=> ["No User Found"]
                ],
            ]);
        }
        $admin = Admin::where('email',$reset->identifier)->first();
        $admin->update(['password' => bcrypt($data['password'])]);
        ResetPassword::where('token',$data['token'])->delete();

        return  return_msg(true,'Success');

    }
}
