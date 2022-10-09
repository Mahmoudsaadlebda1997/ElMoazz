<?php

namespace Modules\AdminModule\Services\Role;

trait RoleServiceHelper
{

    protected function validationCreate($data){
        return validator($data,[
        'title' => 'required']);
    }

    protected function validationUpdate($data){
        return validator($data,[
            'title' => 'required',
            'id' =>'required|exists:roles,id'
        ]);
    }
}
