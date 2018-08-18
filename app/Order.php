<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items()
    {
        return $this->belongsToMany('App\Item', 'orders_items');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
