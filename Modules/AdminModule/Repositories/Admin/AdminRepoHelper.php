<?php

namespace Modules\AdminModule\Repositories\Admin;

trait AdminRepoHelper
{
    public function filter(&$collections,$data){
        if (($data['query'] ?? null)){
            $collections->search($data['query']);
        }
        if (isset($data['role_id'])){
            $collections->where('role_id',$data['role_id']);
        }
        if (isset($data['type'])){
            $collections->where('type',$data['type']);
        }
    }
}
