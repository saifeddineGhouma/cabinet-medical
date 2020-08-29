<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surface extends Model
{
    public function palns()
    {
        return $this->hasMany('App/Plan');
    }
}
