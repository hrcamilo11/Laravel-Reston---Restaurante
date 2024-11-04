<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any users.
     */
    public function viewAny(User $user)
    {
        return strpos($user->email, '@admin') !== false; // Solo los administradores pueden ver la lista de usuarios
    }

    /**
     * Determine whether the user can create users.
     */
    public function create(User $user)
    {
        return strpos($user->email, '@admin') !== false; // Solo los administradores pueden crear usuarios
    }

    /**
     * Determine whether the user can update the user.
     */
    public function update(User $user, User $model)
    {
        return $user->id === $model->id || strpos($user->email, '@admin') !== false; // El usuario puede actualizar su propio perfil o un administrador puede actualizar cualquier usuario
    }

    /**
     * Determine whether the user can delete the user.
     */
    public function delete(User $user, User $model)
    {
        return strpos($user->email, '@admin') !== false; // Solo los administradores pueden eliminar usuarios
    }
}
