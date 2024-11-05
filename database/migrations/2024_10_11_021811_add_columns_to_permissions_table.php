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
        // Verifica si la tabla 'permissions' ya existe
        if (Schema::hasTable('permissions')) {
            // Aquí puedes realizar los cambios necesarios en la tabla
            Schema::table('permissions', function (Blueprint $table) {
                // Ejemplo: agregar una nueva columna, si es necesario
                // $table->string('nueva_columna')->nullable();
            });
        } else {
            // Opcionalmente, podrías crear la tabla si no existe (descomentar si es necesario)
            // Schema::create('permissions', function (Blueprint $table) {
            //     $table->id();
            //     $table->string('name');
            //     $table->string('guard_name');
            //     $table->timestamps();
            // });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Si necesitas revertir los cambios, puedes hacerlo aquí
        Schema::table('permissions', function (Blueprint $table) {
            // Ejemplo: eliminar la columna que agregaste anteriormente
            // $table->dropColumn('nueva_columna');
        });
    }
};
