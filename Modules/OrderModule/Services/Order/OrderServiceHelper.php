<?php

namespace Modules\OrderModule\Services\Order;

use Modules\OrderModule\Entities\Order;

trait OrderServiceHelper
{

    protected function validationCreate($data)
    {
        return validator($data,[
            'cost' => 'required|numeric',
            'address' => 'required',
            'order_image' => 'required|image',
            'title' => 'required',
            'phone' => 'required|numeric|digits:11',
            'finish_date' => 'required|date',
            'description' => 'required|min:10',
            'admin_id' => 'required|exists:admins,id',
            'driver_id' => 'nullable|exists:admins,id',
        ]);
    }
    protected function validationUpdate($data)
    {
        return validator($data,[
            'cost' => 'required|numeric',
            'address' => 'required',
            'order_image' => 'required|image',
            'title' => 'required',
            'phone' => 'required|numeric|digits:11',
            'finish_date' => 'required|date',
            'description' => 'required|min:10',
            'admin_id' => 'required|exists:admins,id',
            'driver_id' => 'nullable|exists:admins,id',
            'id' => 'required|exists:orders.id'
        ]);
    }
    protected function validationUodateStatus($data)
    {
        $statuses = collect(Order::ORDER_STATUS)->values()->filter(function ($i){
            return in_array($i,['completed','cancelled','paid','not_paid','in_progress']);
        })->values()->implode(',');
        return validator($data,[
            'id' => 'required|exists:orders.id',
            'admin_id' => 'required|exists:admins.id',
            'driver_id' => 'nullable|exists:admins.id',
            'status' => "required|in:$statuses"
        ]);
    }


    }
