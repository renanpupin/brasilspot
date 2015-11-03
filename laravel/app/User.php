<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password','idPlanoUsuario','idPerfilUsuario'];

    protected $hidden = ['id','password', 'remember_token'];

    public function PerfilUsuario()
    {
        return $this->hasOne('\App\PerfilUsuario','id','idPerfilUsuario');
    }

    public function Empresa()
    {
        return $this->hasOne('\App\Empresa','id','idUsuario');
    }

    public function Vendedor()
    {
        return $this->hasOne('\App\Vendedor','idUsuario','id');
    }

    public function Comerciante()
    {
        return $this->hasOne('\App\Comerciante','idUsuario','id');
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}