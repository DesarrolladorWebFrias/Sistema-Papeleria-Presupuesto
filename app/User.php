<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ap_paterno', 'ap_materno', 'telefono', 'direccion', 'avatar', 'activo', 'email', 'password', 'role_id','subarea_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('nombre', $role)->first()) {
            return true;
        }
        return false;
    }

    public function username()
    {
        return 'username';
    }

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'activo');
    }

    public function subarea()
    {
        return $this->belongsTo(SubAreas::class, 'subarea_id');
    }

}
