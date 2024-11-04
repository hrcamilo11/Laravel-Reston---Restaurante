<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar todos los productos en el welcome
    public function index()
    {
        $productos = Producto::all(); // Obtiene todos los productos de la base de datos
        return view('welcome', compact('productos')); 
    }

    // Mostrar todos los productos en el dashboard
    public function dashboard()
    {
        $productos = Producto::all(); // Obtiene todos los productos de la base de datos
        return view('dashboard', compact('productos')); // Devolver la vista 'dashboard'
    }

    // Mostrar todos los productos en el menú
    public function showMenu()
    {
        $productos = Producto::all(); // Obtén los productos de la base de datos
        return view('pag.menu', compact('productos')); // Devuelve la vista 'pag.menu'
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
        ]);

        // Guardar la imagen en public/images
        $imagePath = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());

        // Crear un nuevo producto en la base de datos
        Producto::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => 'images/' . $request->file('image')->getClientOriginalName(), // Guardar la ruta de la imagen
        ]);

        // Redirigir al dashboard con un mensaje de éxito
        return redirect()->route('dashboard')
            ->with('success', 'Producto creado con éxito.');
    }

    // Mostrar el formulario de edición de un producto
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto')); // Cargar la vista de edición con el producto seleccionado
    }

    // Actualizar un producto
    public function update(Request $request, Producto $producto)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen (opcional)
        ]);

        // Actualizar los datos del producto
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;

        // Verificar si se subió una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($producto->image) {
                $previousImagePath = public_path($producto->image);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath); // Eliminar la imagen anterior
                }
            }

            // Guardar la nueva imagen en public/images
            $imagePath = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
            $producto->image = 'images/' . $request->file('image')->getClientOriginalName(); // Actualizar la ruta de la imagen
        }

        // Guardar los cambios en la base de datos
        $producto->save();

        // Redirigir al dashboard con un mensaje de éxito
        return redirect()->route('dashboard')
            ->with('success', 'Producto actualizado con éxito.');
    }

    // Eliminar un producto
    public function destroy(Producto $producto)
    {
        // Eliminar la imagen del almacenamiento si existe
        if ($producto->image) {
            $previousImagePath = public_path($producto->image);
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath); // Eliminar la imagen
            }
        }

        // Eliminar el producto de la base de datos
        $producto->delete();

        // Redirigir al dashboard con un mensaje de éxito
        return redirect()->route('dashboard')
            ->with('success', 'Producto eliminado con éxito.');
    }
}
    