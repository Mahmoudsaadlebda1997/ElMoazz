<?php

namespace Modules\CommonModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Modules\CommonModule\Traits\PathHelper;

class ContactUs extends Model
{

    protected $fillable = [
        'name','phone','email','message','read_at','video'
    ];

    protected $appends = ['video_path'];

    public function getVideoPathAttribute(){

        if ($this->video){
            return Storage::url($this->video);
        }

        return null;
    }

}
