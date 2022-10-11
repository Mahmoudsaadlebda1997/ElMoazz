<?php

namespace Modules\AdminModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\CommonModule\Traits\PathHelper;
use Spatie\Activitylog\Traits\LogsActivity;

class Admin extends Model
{
    use PathHelper,LogsActivity;

    protected static $logAttributes = [
        'name', 'username','type','email','phone','image'
    ];

    protected $fillable = ['name','phone','image','username','email','password','remember_token','type','role_id'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'Admin';


    protected $appends =['image_path'];

    protected $hidden = ['password', 'remember_token'];

    public function role(){

        return $this->belongsTo(Role::class,'role_id');
    }
    public function scopeSearch($query,$term){
    return $query->where(function ($q)use($term){
        return $q->where('name','LIKE',"%$term%")
            ->orWhere('username','LIKE',"%$term%")
            ->orWhere('email','LIKE',"%$term%")
            ->orWhere('phone','LIKE',"%$term%");
    });
    }
}
