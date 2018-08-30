<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
	protected $table = "verification";
	
    public function user()
    {
    	return $this->hasOne('App\User', 'user_id', 'id');
    }
}
