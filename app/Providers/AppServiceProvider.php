<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Comment; // Importa el modelo Comment

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Usar un View Composer para compartir comentarios en las vistas 'welcome' y 'dashboard'
        View::composer(['welcome', 'dashboard'], function ($view) {
            $comments = Comment::all(); // Obtén todos los comentarios
            $view->with('comments', $comments); // Comparte la variable $comments con las vistas
        });
    }
}
