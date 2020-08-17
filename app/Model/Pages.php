<?php

namespace App\Model;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use Translatable;
    protected $translatable = ['title', 'body'];
}
