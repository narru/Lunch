<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function menus()
    {
    	return $this->hasOne('App\Menu', 'id', 'category_id');
    }
  	
  	
}
