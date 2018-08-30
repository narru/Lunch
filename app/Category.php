<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'description'];

    public function items()
    {
        return $this->hasMany('App\Item', 'category_id');
    }
  
}
