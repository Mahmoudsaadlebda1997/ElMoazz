<?php
namespace Modules\AdminModule\Services\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\AdminModule\Entities\Admin;
use Modules\AdminModule\Repositories\Admin\AdminRepository;
use Modules\CommonModule\Entities\ResetPassword;
use Modules\CommonModule\Traits\UploadHelper;

class AdminService
{
    use AdminServiceHelper,UploadHelper;

    protected $adminRepository;

    public function __construct()
    {
        $adminRepository = new AdminRepository();
    }

    public function login(array $data)
    {
        $validation = $this->validationLogin($data);
        if ($validation->fails()){
            return return_msg(false,'Validation Errors',[
                'validation_errors' => $validation->getMessageBag()->getMessages(),
            ]);
        }
        $rememeber =($data['remember_token'] ?? null) ? true : false;
        $username_or_email = $data['username'];
        if(filter_var($username_or_email,FILTER_VALIDATE_EMAIL)){
            $attemp =Auth::guard('admin')->attempt(['email'=>$data['username'],'password'=>$data['password'],$rememeber]);
        }else{
            $attemp = Auth::guard('admin')->attempt(['username'=>$data['username'],'password'=>$data['password'],$rememeber]);
        }
        if($attemp){
            $admin = auth('admin')->user();
            $token = auth('admin_api')->login($admin);
            return return_msg(true,'Success',compact('admin','token'));

        }
        return return_msg(false,'Validation Errors',[
            'validation_errors' => [
                'username' => [__('messages.login_error')]
            ],
        ]);
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return return_msg(true,'Success');

    }
    public function create(array $data){
        try {
            DB::beginTransaction();
            //validate Data
            $validation = $this->validationCreate($data);
            if ($validation->fails()) {
                return return_msg(false, 'Validation Errors', [
                    'validation_errors' => $validation->getMessageBag()->getMessages(),
                ]);
            }
            $data['password'] = bcrypt($data['password']);
            !($data['image'] ?? null) ? : $data['image'] = ($this->uploadFile($data['image'] ?? null,'admins')['name'] ?? null);
            $admin = $this->adminRepository->create($data);
            DB::commit();
            return return_msg(true,'Success',$admin);


        }
        catch (\Exception $exception){
            DB::rollBack();

            handleExceptionDD($exception);
            return return_msg(false,'Success',[
                'validation_errors' => [
                    'username' => [__('messages.server_error')],
                    'error_id' => [__('messages.server_error')],
                ],
            ]);
        }
    }
    public function update(array $data){
        try {
            DB::beginTransaction();
            //validate Data
            $validation = $this->validationUpdate($data);
            if ($validation->fails()) {
                return return_msg(false, 'Validation Errors', [
                    'validation_errors' => $validation->getMessageBag()->getMessages(),
                ]);
            }
            !($data['password'] ?? null) ? : $data['password'] = bcrypt($data['password']);
            if(!($data['password'] ?? null)){
                unset($data['password']);
            }
            if ($data['image'] ?? null){
                // unlink
                $admin = $this->adminRepository->find($data['id']);
                $this->removeFile([$admin->image]);
                $data['image'] = $this->uploadFile($data['image'] ?? null,'admins')['name'] ?? null;
                $admin = $this->adminRepository->update($data);
                DB::commit();

                return return_msg(true,'Success',$admin);
            }else{
                unset($data['image']);
            }
        }
        catch (\Exception $exception){
            DB::rollBack();
            handleExceptionDD($exception);
            return return_msg(false,'Success',[
                'validation_errors' => [
                    'error_id' => [__('messages.server_error')],
                ],
            ]);
        }
    }
    public function all(array $data){
        try {
            $admins =$this->adminRepository->all($data);
            return return_msg(true,'Success',$admins);

        }catch (\Exception $exception){
            DB::rollBack();
            handleExceptionDD($exception);
            return return_msg(false,'Success',[
                'validation_errors' => [
                    'error_id' => [__('messages.server_error')],
                ],
            ]);
        }
    }
    public function find($id){
        try {
            $admin = $this->adminRepository->find($id);
            return return_msg($admin ? true : false,'Success',$admin);
        }catch (\Exception $exception){
            DB::rollBack();
            handleExceptionDD($exception);
            return return_msg(false,'Success',[
                'validation_errors' => [
                    'error_id' => [__('messages.server_error')],
                ],
            ]);
        }
    }
    public function delete(array $data){
        try {
            $this->adminRepository->delete($data['ids'] ?? []);
            return return_msg(true,'Success');
        }catch (\Exception $exception){
            DB::rollBack();
            handleExceptionDD($exception);
            return return_msg(false,'Success',[
                'validation_errors' => [
                    'error_id' => [__('messages.server_error')],
                ],
            ]);
        }
    }
    public function updatePassword(array $data){
        $validation = $this->validationUpdatePassword($data);
        if ($validation->fails()){
            return return_msg(false,'Validation Errors',[
                'validation_errors' => $validation->getMessageBag()->getMessages(),
            ]);
        }
        $admin = $this->adminRepository->find($data['id'] ?? null);
        if (Hash::check($data['old_password'],$admin->password)){
            if (Hash::check($data['password'],$admin->password)){
                return return_msg(false,'Validation Errors',[
                    'validation_errors' => [
                        'password' => [__('messages.same_password')]
                    ],
                ]);
            }

            $admin->password = bcrypt($data['password']);
            $admin->save();
            return return_msg(true,'Success');
        }
        return return_msg(false,'Validation Errors',[
            'validation_errors' => [
                'old_password' => [__('messages.old_password')]
            ],
        ]);
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

}
