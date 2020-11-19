<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
class Reporte_Excel_Fecha implements FromView
{
    private $Fecha_Inicial;
    private $Fecha_Final;
	public function __construct($Fecha1,$Fecha2)
    {
        $this->Fecha_Inicial = $Fecha1;
        $this->Fecha_Final = $Fecha2;
    }

    public function view():View
    {
    	$ResultadoPreguntas=DB::table('MCA_Informacion_Registro')->whereBetween('created_at', [$this->Fecha_Inicial, $this->Fecha_Final])->get();
        return view('Reporte.VCA_Vista_Excel',[
        	'ResultadoPreguntas' => $ResultadoPreguntas
        ]);
    }
}
