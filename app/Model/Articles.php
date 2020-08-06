<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'posts';

    public function author()
    {
        return $this->belongsTo(Users::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
