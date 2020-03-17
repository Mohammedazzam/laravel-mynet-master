<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    //scopes ---------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }// end of scopeWhenSearch

    public function scopeWhenRole($query, $role_id)
    {
        return $query->when($role_id, function ($q) use ($role_id) {
            return $this->scopeWhereRole($q, $role_id);
        });

    }// end of scopeWhenRole

    public function scopeWhereRole($query, $role_name)
    {
        return $query->whereHas('roles', function ($q) use ($role_name) {
            return $q->whereIn('name', (array)$role_name)
                ->orWhereIn('id', (array)$role_name);
        });

    }// end of scopeWhereRole

    public function scopeWhereRoleNot($query, $role_name)
    {
        return $query->whereHas('roles', function ($q) use ($role_name) {
            return $q->whereNotIn('name', (array)$role_name)
                ->whereNotIn('id', (array)$role_name);
        });

    }// end of scopeWhereRoleNot

}
