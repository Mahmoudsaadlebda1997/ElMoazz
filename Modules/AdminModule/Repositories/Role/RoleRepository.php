<?php
namespace Modules\AdminModule\Repositories\Role;

use Modules\AdminModule\Entities\Role;

class RoleRepository
{
    use RoleRepoHelper;

    private $roleModel;

    public function __construct()
    {
        $this->roleModel = new Role();
    }

    public function create(array $data){

        $role = $this->roleModel->create($data);

        return $role;
    }
    public function update(array $data){

        $role = $this->roleModel->find($data['id'] ?? null);

        $role->update($data);

        return $role;
    }
    public function find($id){

        return $this->roleModel->whereId($id)->with('admins')->first();

    }
    public function findByIds($ids){
        return $this->roleModel->whereIn('id',$ids)->with('admins')->get();
    }

    public function delete($ids){

        return $this->roleModel->whereIn('id',$ids)->delete();
    }

    public function all(array $data){
        $roles =$this->roleModel->with('admins')->orderBy('id');
        $this->filter($roles, $data);
        return getCaseCollection($roles, $data);
    }
}
