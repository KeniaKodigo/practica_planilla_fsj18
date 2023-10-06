<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * crea la migracion y la lanza a la base de datos
     */
    public function up(): void
    {
        Schema::create('departamento', function (Blueprint $table) {
            $table->id();//primary key
            $table->string('nombre', 50); 
            $table->timestamps();//create_at (fecha y hora)  update_at
        });
    }

    /**
     * Reverse the migrations.
     * volcar a la tabla
     */
    public function down(): void
    {
        Schema::dropIfExists('departamento');
    }
};
