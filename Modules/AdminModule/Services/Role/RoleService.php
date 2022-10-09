<?php

namespace Modules\AdminModule\Services\Role;

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
        // Validate Data
        $validation = $this->validationCreate($data);
        if($validation->fails()){
            return return_msg(false,'Validation Errors',[
                'validation_errors' => $validation->getMessageBag()->getMessages(),
            ]);
        }
        // Create Data
        $item = $this->roleRepository->create($data);

        return return_msg(true,'Success',$item);
    }
    public function update(array $data){
        // Validate Data
        $validation = $this->validationUpdate($data);
        if($validation->fails()){
            return return_msg(false,'Validation Errors',[
                'validation_errors' => $validation->getMessageBag()->getMessages(),
            ]);
        }
        // Update Data
        $item = $this->roleRepository->update($data);
        return return_msg(true,'Success',$item);
    }
    public function find($id){
        $item = $this->roleRepository->find($id);
        return return_msg($item ? true : false,'Success',$item);
    }
    public function delete(array $data){
        // Check Before Delete

        $roles = $this->roleRepository->findByIds($data['ids'] ?? null);

        foreach ($roles as $role){
            if ($role->admins->count()){
                return return_msg(false,'Validation',[
                    'validation_errors' => [
                        'error_id' => [
                            __('messages.role_delete')
                        ]
                    ]
                ]);
            }
        }
        $role =$this->roleRepository->delete($data['ids'] ?? []);

        if ($role){
            return return_msg(true,'Success');
        }
        return return_msg(false,'Success',$role);
    }
    public function all()
    {
        $roles = $this->roleRepository->all(request()->all());
        return return_msg(true,'Success',$roles);
    }
}
