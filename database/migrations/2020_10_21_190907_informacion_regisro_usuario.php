<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InformacionRegisroUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MCA_Informacion_Registro', function (Blueprint $table) {
            $table->increments('PK')->unsigned()->nullable($value = false);//Columna donde se guarda la llave primaria
            $table->string('NombreCompleto')->nullable($value = false)->collation('utf8_spanish2_ci');//Columna donde se guarda el nombre completo del usuario
            $table->string('Email')->nullable($value = false)->collation('utf8_spanish2_ci');//Columna donde se guarda el correo electronico del usuario
            $table->integer('TipoIdentificacion')->unsigned()->nullable($value = false)->collation('utf8_spanish2_ci');//Columna donde se guarda el tipo de identificación del usuario
            $table->bigInteger('NumeroIdentificacion')->unsigned()->nullable($value = false);//Columna donde se guarda el numero de identificación del usuario
            $table->integer('PreguntaActual')->unsigned()->nullable($value = false)->collation('utf8_spanish2_ci');//Columna donde se guarda la pregunta actual en la que se encuentra el usuario
            $table->string('Estado')->nullable($value = false)->collation('utf8_spanish2_ci');//Columna donde se guarda el estado del usuario
            $table->timestamps();//Columna donde se almacena la fecha de creación y modificación del registro
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MCA_Informacion_Registro');
    }
}
