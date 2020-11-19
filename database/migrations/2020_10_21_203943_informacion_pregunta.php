<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InformacionPregunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MCA_Preguntas', function (Blueprint $table) {
            $table->increments('PK')->unsigned()->nullable($value = false);//Columna donde se guarda la llave primaria
            $table->string('Pregunta')->nullable($value = false)->collation('utf8_spanish2_ci');//Columna donde se guarda la pregunta que se le realizara al usuario
            $table->string('RutaImagen')->nullable($value = true)->collation('utf8_spanish2_ci');//Columna donde se guarda la ruta de la imagen de referencia para el usuario
            $table->timestamps();//Columna donde se almacena la fecha de creación y modificación del registro
        });

        $BD = "INSERT INTO `MCA_Preguntas` (`PK`,`Pregunta`,`RutaImagen`)
            VALUES
        
            (1,'1. ¿CUANTO DEBE DURAR EL LAVADO DE MANOS COMO MINIMO?','/img/lavadoDeManos.jpg'),
            (2,'2. ¿CUÁLES SON LOS SÍNTOMAS PRINCIPALES?','/img/SintomasDelCoronavirus.png'),
            (3,'3. ¿REALMENTE SIRVE DE ALGO LLEVAR MASCARILLA?','/img/llevarMascarrilla.jpg'),
            (4,'4. ¿QUE DEBO TOMAR APARTE DE ACETAMENOFEN PARA CONTROLAR LOS SINTOMAS?','/img/MedicamentosParaCovid.jpg');";
            
        DB::statement($BD);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MCA_Preguntas');
    }
}
