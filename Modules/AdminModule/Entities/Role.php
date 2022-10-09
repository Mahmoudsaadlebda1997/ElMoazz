<?php

namespace Modules\AdminModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use LogsActivity;

    protected $fillable = ['title'];

    protected static $logName = 'Role';

    protected static $logOnlyDirty = true;

    protected static $logAttributes = [
        'title'
    ];

    public function admins(){
        return $this->hasMany(Admin::class,'role_id');
    }

    public function scopeSearch($query,$term){
        return $query->where(function ($q)use($term){
            return $q->where('title','LIKE',"%$term%");
        });
    }
}
