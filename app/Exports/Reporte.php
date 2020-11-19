<?php

namespace App\Exports;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
class Reporte implements FromView
{
	private $IdPregunta;
	public function __construct(int $Id)
    {
        $this->IdPregunta = $Id;
    }

    public function view():View
    {
    	$ResultadoPreguntas=DB::table('MCA_Informacion_Registro')->where('PreguntaActual', $this->IdPregunta)->get();
        return view('Reporte.VCA_Vista_Excel',[
        	'ResultadoPreguntas' => $ResultadoPreguntas
        ]);
    }
}
