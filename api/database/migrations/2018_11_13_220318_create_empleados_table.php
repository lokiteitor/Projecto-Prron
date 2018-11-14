<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->integer('nomina')->nullable(false);
            $table->string("nombre")->nullable(false);
            $table->string("ap_paterno")->nullable(false);
            $table->string("ap_materno")->nullable(false);
            $table->string("direccion")->nullable(false);
            $table->integer("id_departamento")->nullable(false);
            $table->enum("tipo_empleado",array("operario","confianza"))->nullable(false);
            $table->float("sueldo")->nullable(false);
            $table->timestamps();
            $table->primary('nomina');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
