<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Producto; // Asegúrate de que el modelo Producto esté correctamente importado
use App\Models\User; // Importar el modelo User
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Mostrar comentarios, productos y usuarios en el dashboard
    public function index()
    {
        // Obtener todos los comentarios (considera usar paginación si hay muchos)
        $comments = Comment::paginate(10); // Cambia 10 por el número de comentarios que desees mostrar por página
        // Obtener todos los productos
        $productos = Producto::paginate(100); // Cambia 10 por el número de productos que desees mostrar por página
        // Obtener todos los usuarios y sus roles
        $users = User::with('roles')->paginate(10); // Cambia 10 por el número de usuarios que desees mostrar por página

        // Retornar la vista con las variables necesarias
        return view('dashboard', compact('comments', 'productos', 'users'));
    }
}
