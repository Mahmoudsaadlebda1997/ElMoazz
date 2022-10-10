<?php

namespace Modules\CommonModule\Entities;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $table = 'reset_passwords';

    protected $fillable = [
        'identifier','token'
    ];

    protected $hidden = ['token'];
}
