<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Modules\AdminModule\Entities\Admin;
use Modules\CommonModule\Traits\PathHelper;

class Order extends Model
{
    use PathHelper;

    const ORDER_STATUS= [
        'completed'=>'completed',
        'paid'=>'paid',
        'not_paid'=>'not_paid',
        'in_progress'=>'in_progress',
        'cancelled'=>'cancelled'
    ];

    protected $fillable = ['driver_id','admin_id','cost','description','title','order_image','phone','address','finish_date','status'];

    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');

    }
    public function driver(){
        return $this->belongsTo(Admin::class,'driver_id');
    }
    public function scopeSearch($query,$term){
        return $query->where(function ($q)use($term){
            return $q->where('description','LIKE',"%$term%")
                ->orWhere('title','LIKE',"%$term%")
                ->orWhere('address','LIKE',"%$term%")
                ->orWhere('phone','LIKE',"%$term%");
    });
    }
    protected $appends = ['order_image_path'];

    public function getItemImagePathAttribute()
    {
        if($this->order_image){
            return Storage::url($this->order_image);
        }
        return \Avatar::create($this->title)->toBase64();

    }


}
