<?php

namespace App\Model;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'posts';
    use Translatable;
    protected $translatable = ['title', 'body'];

    public function author()
    {
        return $this->belongsTo(Users::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
