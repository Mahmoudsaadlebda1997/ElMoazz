<?php

namespace Modules\AdminModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{

    protected $fillable = ['title'];

    public function admins(){
        return $this->hasMany(Admin::class,'role_id');
    }

    public function scopeSearch($query,$term){
        return $query->where(function ($q)use($term){
            return $q->where('title','LIKE',"%$term%");
        });
    }
}
