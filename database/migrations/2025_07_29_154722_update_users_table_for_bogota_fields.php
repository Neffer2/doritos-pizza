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
        Schema::table('users', function (Blueprint $table) {
            // Cambiar de varchar a foreign key
            $table->dropColumn('ciudad');
            
            // Agregar nuevos campos
            $table->foreignId('departamento_id')->nullable()->constrained('departamentos')->onDelete('set null');
            $table->foreignId('ciudad_id')->nullable()->constrained('ciudades')->onDelete('set null');
            $table->foreignId('localidad_id')->nullable()->constrained('localidades')->onDelete('set null');
            $table->foreignId('barrio_id')->nullable()->constrained('barrios')->onDelete('set null');
            $table->string('direccion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
            $table->dropForeign(['ciudad_id']);
            $table->dropForeign(['localidad_id']);
            $table->dropForeign(['barrio_id']);
            
            $table->dropColumn([
                'departamento_id',
                'ciudad_id', 
                'localidad_id',
                'barrio_id',
                'direccion',
                'fecha_nacimiento'
            ]);
            
            $table->string('ciudad')->nullable();
        });
    }
};
