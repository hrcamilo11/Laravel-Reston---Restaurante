<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Asegúrate de que el nombre de la tabla sea 'productos'

    protected $fillable = ['name', 'description', 'price','image']; // Actualiza los nombres de las columnas
}
