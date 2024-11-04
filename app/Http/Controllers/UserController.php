<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Mostrar todos los usuarios en el dashboard
    public function index()
    {
        $this->authorize('viewAny', User::class); // Verificar si el usuario puede ver la lista

        $usuarios = User::all(); // Obtiene todos los usuarios
        return view('dashboard', compact('usuarios')); // Pasar solo los usuarios a la vista
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        $this->authorize('create', User::class); // Verificar si el usuario puede crear

        return view('usuarios.create'); // Vista para crear un usuario
    }

    // Almacenar un nuevo usuario
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Crear el nuevo usuario en la base de datos, con la imagen por defecto
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'photo' => 'images/usuario.png', // Ruta a la imagen por defecto
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Usuario creado con éxito.');
    }
    

    // Mostrar el formulario de edición de un usuario
    public function edit(User $usuario)
    {
        $this->authorize('update', $usuario); // Verificar si el usuario puede editar

        return view('usuarios.edit', compact('usuario')); // Vista de edición
    }

    // Actualizar un usuario
    public function update(Request $request, User $usuario)
    {
        $this->authorize('update', $usuario); // Verificar si el usuario puede editar

        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id, // Ignorar el correo del usuario actual
            'password' => 'nullable|string|min:8|confirmed', // Contraseña opcional
        ]);

        // Actualizar datos del usuario
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        // Actualizar la contraseña si se proporciona
        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password); // Cifrar la nueva contraseña
        }

        // Guardar los cambios
        $usuario->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('dashboard')
            ->with('success', 'Usuario actualizado con éxito.');
    }

    // Eliminar un usuario
    public function destroy(User $usuario)
    {
        $this->authorize('delete', $usuario); // Verificar si el usuario puede eliminar

        // Eliminar usuario
        $usuario->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('dashboard')
            ->with('success', 'Usuario eliminado con éxito.');
    }

    // Actualizar nombre y email
    public function updateNameEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $request->user()->id,
        ]);

        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('status', 'Nombre y email actualizados con éxito.');
    }

    // Actualizar contraseña
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = $request->user();

        // Verificar si la contraseña actual es correcta
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
        }

        // Actualizar la contraseña
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status', 'Contraseña actualizada con éxito.');
    }

    // Actualizar foto de perfil
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar que sea una imagen
        ]);
    
        $user = $request->user();
    
        // Verifica si el usuario está autenticado
        if (!$user) {
            return back()->withErrors(['msg' => 'No estás autenticado.']);
        }
    
        // Manejar la carga de la imagen
        if ($request->hasFile('photo')) {
            // Generar un nombre único para la imagen
            $photoName = time() . '.' . $request->photo->extension();
            
            // Mover la imagen a la carpeta "public/images"
            $request->photo->move(public_path('images'), $photoName);
    
            // Actualizar el campo 'photo' en la base de datos con la ruta relativa
            $user->photo = 'images/' . $photoName;
            $user->save();
        }
    
        return back()->with('status', 'Foto de perfil actualizada con éxito.');
    }

    // Obtener URL de la imagen de perfil
    public function getProfileImage()
    {
        $user = auth()->user();
        $imageUrl = $user->photo ? asset($user->photo) : asset('images/usuario.png');
        return response()->json(['imageUrl' => $imageUrl]);
    }
    
}
