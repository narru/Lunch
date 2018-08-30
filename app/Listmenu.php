<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listmenu extends Model
{
    public function items()
    {
    	return $this->belongsToMany('App\Item','Orders_item');
    }

}
