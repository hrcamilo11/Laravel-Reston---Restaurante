<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Mostrar todos los comentarios
    public function index()
    {
        // Obtener todos los comentarios de la base de datos
        $comments = Comment::all();
        // Devolver la vista 'dashboard' con los comentarios
        return view('dashboard', compact('comments'));
    }

    // Crear un nuevo comentario
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Crear un nuevo comentario en la base de datos
        $comment = Comment::create($request->only(['name', 'message'])); // Asegúrate de que solo los campos permitidos se utilicen
        
        // Retornar respuesta JSON con el comentario creado
        return response()->json([
            'message' => 'Comentario agregado exitosamente.',
            'comment' => $comment
        ], 201);
    }

    // Actualizar un comentario
    public function update(Request $request, Comment $comment)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Actualizar el comentario en la base de datos
        $comment->update($request->only(['name', 'message'])); // Asegúrate de que solo los campos permitidos se utilicen
        
        // Redirigir de nuevo al dashboard
        return redirect()->route('dashboard')->with('success', 'Comentario actualizado exitosamente.');
    }

    // Eliminar un comentario
    public function destroy(Comment $comment)
    {
        // Eliminar el comentario de la base de datos
        $comment->delete();
            
        // Redirigir de nuevo al dashboard
        return redirect()->route('dashboard')->with('success', 'Comentario eliminado exitosamente.');
    }
}
