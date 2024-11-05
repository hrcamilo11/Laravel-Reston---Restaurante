<?php

use App\Http\Controllers\{
    ProfileController,
    TaskController,
    CommentController,
    ProductoController,
    DashboardController,
    Auth\AuthenticatedSessionController,
    UserController
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aquí puedes registrar las rutas web para tu aplicación.
*/

// Página de inicio mostrando los productos
Route::get('/', [ProductoController::class, 'index'])->name('welcome');

// Dashboard, accesible solo para usuarios autenticados y verificados
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Página "Acerca de Nosotros"
Route::view('/about', 'pag.about')->name('about'); // Asegura que 'resources/views/pag/about.blade.php' existe

// Página del usuario con su información
Route::get('/user', function () {
    return view('pag.user', ['user' => auth()->user()]);
})->middleware('auth')->name('user');

// Rutas para actualizar información del usuario, incluidas foto de perfil y obtención de la imagen
Route::prefix('user')->middleware('auth')->group(function () {
    Route::put('/update-name-email', [UserController::class, 'updateNameEmail'])->name('user.updateNameEmail');
    Route::put('/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
    Route::put('/update-photo', [UserController::class, 'updatePhoto'])->name('user.updatePhoto');
    Route::get('/profile-image', [UserController::class, 'getProfileImage'])->name('user.profileImage');
});

// Página del libro
Route::view('/book', 'pag.book')->name('book'); // Asegura que 'resources/views/pag/book.blade.php' existe

// Página del menú, mostrando productos
Route::get('/menu', [ProductoController::class, 'showMenu'])->name('menu');

// Rutas CRUD para tareas y comentarios, protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::resource('comments', CommentController::class);
});

// Agrupación de rutas CRUD para productos y usuarios, protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::resource('productos', ProductoController::class);
    Route::resource('users', UserController::class);
});

// Rutas para perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta para cerrar sesión con GET
Route::get('/exit', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('exit');

// Ruta para cerrar sesión explícitamente usando POST
Route::post('/exit', [AuthenticatedSessionController::class, 'destroy'])->name('exit.post');

// Incluir las rutas de autenticación predeterminadas de Laravel
require __DIR__.'/auth.php';
