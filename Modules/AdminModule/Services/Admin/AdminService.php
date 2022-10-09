<?php
namespace Modules\AdminModule\Services\Admin;

use Modules\AdminModule\Repositories\Admin\AdminRepository;

class AdminService
{
    use AdminServiceHelper,UploadHelper;

    protected $adminRepository;

    public function __construct()
    {
        $adminRepository = new AdminRepository();
    }

    public function login(array $data){

    }

}
