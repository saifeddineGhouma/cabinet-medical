<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function Architect()
    {
        return $this->belongsTo('App\Architect');
    }
    public function surfaces()
    {
        return $this->hasMany('App\Surface');
    }
}
