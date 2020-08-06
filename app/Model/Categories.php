<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function articles()
    {
        return $this->hasMany('App\Model\Articles','category_id', 'id');
    }
}
