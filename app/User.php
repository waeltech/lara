<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin() 
    {
       return in_array(1, $this->roles()->pluck('role_id')->all());
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
     
        return !! $role->intersect($this->roles)->count();
    }

    public function hasPermission($permission)
    {
        return $this->hasRole($permission->roles);
    }

    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }
    public function userjob()
    {
        return $this->belongsToMany(UserJobs::class);
    }
}
