<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InformacionRespuesta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MCA_Respuestas', function (Blueprint $table) {
            $table->increments('PK')->unsigned()->nullable($value = false);//Columna donde se guarda la llave primaria
            $table->integer('FK_MCA_Preguntas')->unsigned()->nullable($value = false);//Columna donde se guarda la llave foranea
            $table->foreign('FK_MCA_Preguntas')->references('PK')->on('MCA_Preguntas')->onDelete('cascade');//Referencia hacia la tabla padre
            $table->string('Respuesta')->nullable($value = false)->collation('utf8_spanish2_ci');//Columna donde se guarda la respuesta que el usuario podra seleccionar
            $table->integer('RespuestaCorrecta')->unsigned()->nullable($value = false);//Columna donde se guarda la respuesta correcta
            $table->integer('NumeroPregunta')->unsigned()->nullable($value = false);//Columna donde se guarda el numero de la respuesta
            $table->timestamps();//Columna donde se almacena la fecha de creación y modificación del registro
        });

        $BD = "INSERT INTO `MCA_Respuestas` (`PK`,`FK_MCA_Preguntas`,`Respuesta`,`RespuestaCorrecta`,`NumeroPregunta`)
            VALUES
        
            (1,1,'20 segundos',1,1),
            (2,1,'15 segundos',0,2),
            (3,1,'10 segundos',0,3),
            (4,1,'5 segundos',0,4),
            (5,2,'La fiebre, la fatiga y tos',1,1),
            (6,2,'Dolor de estomago',0,2),
            (7,2,'Vomito',0,3),
            (8,2,'Diarrea',0,4),
            (9,3,'Solo sirve si se es portador',1,1),
            (10,3,'Siempre sirve tenerlo puesto',0,2),
            (11,3,'No sirve de nada usarlo',0,3),
            (12,3,'Solo cuando se está con gente',0,4),
            (13,4,'Agua',1,1),
            (14,4,'Aspirinas',0,2),
            (15,4,'Agua de Panela',0,3),
            (16,4,'Chocolate Caliente',0,4);";

        DB::statement($BD);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MCA_Respuestas');
    }
}
