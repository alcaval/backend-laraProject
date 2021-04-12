<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            
            $table->id();
            $table->string('titulo');
            $table->string('cod');
            $table->string('loc');
            $table->date('fIngreso');
            $table->date('fAlta');
            $table->date('fReingreso')->nullable();;
            $table->string('edad');
            $table->string('sexo');
            $table->string('tipo');
            $table->string('NDA');
            $table->string('NPA');
            $table->string('datos');
            $table->string('user');
            $table->date('updated_at');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial');
    }
}
