<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user');
    }
     public function attachRole($role)
    {
        return $this->roles()->sync(
            [Role::whereName($role)->firstOrFail()->id]
        );
    }
}
