<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Asegúrate de que esto esté habilitado en tu versión de Laravel
    ];

    // Relación con roles
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user'); // Asegúrate de que el nombre de la tabla 'role_user' sea correcto
    }
}
