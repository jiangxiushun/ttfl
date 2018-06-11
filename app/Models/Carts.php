<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use User;
use App\Models\Goods;

class Carts extends Model
{
    protected $table = 'carts';

    /**
    *	一对一
    */
    public function goodCart()
    {
    	return $this->hasOne('App\Models\Goods','id');
    }
    
}
