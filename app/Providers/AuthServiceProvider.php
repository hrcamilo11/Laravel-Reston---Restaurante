<?php

namespace App\Providers;

use App\Models\User; // Asegúrate de importar el modelo User
use App\Policies\UserPolicy; // Asegúrate de importar la política UserPolicy
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Aquí puedes registrar cualquier Gate adicional si es necesario
    }
}
