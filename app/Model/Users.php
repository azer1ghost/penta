<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public function role()
    {
        return $this->hasMany('App\Model\Roles','role_id', 'id');
    }
}
