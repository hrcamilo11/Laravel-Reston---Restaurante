<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Renombrar la tabla 'products' a 'productos'
        Schema::rename('products', 'productos');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Volver a renombrar la tabla 'productos' a 'products'
        Schema::rename('productos', 'products');
    }
};
