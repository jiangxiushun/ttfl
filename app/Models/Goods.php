<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cates;
class Goods extends Model
{
    protected $table = 'goods';

    public function goodCates()
    {
    	return $this->belongsTo('App\Models\Cates','cid','id');
    }
}
