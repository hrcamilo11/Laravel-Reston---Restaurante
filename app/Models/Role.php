<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Define la relación inversa con los usuarios
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user'); // Asegúrate de que la tabla pivot se llama 'role_user'
    }
}
