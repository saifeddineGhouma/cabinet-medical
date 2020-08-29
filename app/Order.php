<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function paln(){
        return $this->hasOne('App\Plan');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
