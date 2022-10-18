<?php

namespace Modules\OrderModule\Repositories\Order;

use Carbon\Carbon;

trait OrderRepoHelper {

    protected function filter(&$collections,$data){
        if($data['query'] ?? null){
            $collections->search($data['query']);
        }
        if($data['admin_id'] ?? null){
            $collections->where('admin_id',$data['admin_id']);
        }
        if($data['driver_id'] ?? null) {
            $collections->where('driver_id','driver_id');
        }
        if($data['cost'] ?? null){
            $collections->where('cost',$data['cost']);
        }
        if($data['status'] ?? null){
            $collections->where('status',$data['status']);
        }
        if($data['finish_date'] ?? null){
            $current_date =Carbon::now();
            $collections->where('finish_date','>=',$current_date);
        }
    }
}
