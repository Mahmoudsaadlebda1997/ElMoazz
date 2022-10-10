<?php

namespace Modules\AdminModule\Services\Role;

use Illuminate\Support\Facades\DB;
use Modules\AdminModule\Repositories\Role\RoleRepository;

class RoleService
{
    use RoleServiceHelper;
    private $roleRepository;

    public function __construct()
    {
        $this->roleRepository = new RoleRepository();
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
            $role = $this->roleRepository->create($data);
            DB::commit();

            return return_msg(true,'Success',$role);
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
                $role = $this->roleRepository->update($data);
                DB::commit();
                return return_msg(true,'Success',$role);
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
    public function find($id){
        try {
            $role = $this->roleRepository->find($id);
            return return_msg($role ? true : false,'Success',$role);
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
            $this->roleRepository->delete($data['ids'] ?? []);
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
    public function all(array $data){
        try {
            $admins =$this->roleRepository->all($data);
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
}
