<?php

namespace Modules\AdminModule\Repositories\Role;

trait RoleRepoHelper
{
    public function filter(&$collections,$data){
        if (($data['query'] ?? null)){
            $collections->search($data['query']);
        }
    }
}
