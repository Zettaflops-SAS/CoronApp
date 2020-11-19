<?php

namespace App\Http\Controllers;
use DB;
use Excel;
use PDF;
use App\Exports\Reporte;
use App\Exports\Reporte_Excel_Fecha;
use Illuminate\Http\Request;

class CCA_Controlador_Reportes extends Controller
{

    /**
	*middleware encargado de validar que el usuario este logeado antes de poder
	*usar el controlador y que este en estado de activo
	*/
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Estado_Usuario');
    }

    public function Mostrar_Reporte_Grafico(){
    	$ResultadoPreguntas = DB::table('MCA_Preguntas')->paginate(5);
    	return view('Reporte.VCA_Reporte_Grafico',compact('ResultadoPreguntas'));
    }

    public function Generar_Estadistica_Pregunta(Request $request){
    	$ResultadoPreguntas = DB::table('MCA_Informacion_Registro')->where('PreguntaActual', $request->input('VCA_Numero_Pregunta'))->count();
        $TotalPreguntas = DB::table('MCA_Preguntas')->count();
    	$Respuesta[]=$ResultadoPreguntas;
    	$Respuesta[]=$request->input('VCA_Numero_Pregunta');
        $Respuesta[]=$TotalPreguntas;
        return $Respuesta;
    }

    public function Generar_Reporte_Excel_Preguntas($IdPregunta){
        return Excel::download(new Reporte($IdPregunta),'Reporte.xlsx');
    }

    public function Mostrar_Reporte_Documento(){
        $ResultadoRegistroUsuario = DB::table('MCA_Informacion_Registro')->paginate(15);
        return view('Reporte.VCA_Reporte_Documento',compact('ResultadoRegistroUsuario'));
    }

    public function Generar_Reporte_PDF($IdUsuario){

        $ResultadoRegistro = DB::table('MCA_Informacion_Registro')->where('PK',$IdUsuario)->first();
        $ResultadoPregunta = DB::table('MCA_Preguntas')->get();
        $ResultadoRespuesta = DB::table('MCA_Respuestas')->get();

        $pdf = PDF::loadView('Reporte.VCA_Vista_PDF', ['ResultadoRegistro'=>$ResultadoRegistro,'ResultadoPregunta'=>$ResultadoPregunta,'ResultadoRespuesta'=>$ResultadoRespuesta]);
        return $pdf->download('Reporte.pdf');
    }

    public function Mostrar_Usuarios_Filtrados(Request $request){
        try {
            $ResultadoRegistroUsuario = DB::table('MCA_Informacion_Registro')->where('NumeroIdentificacion', 'like', '%'.$request->input('CVCA_Numero_Documento').'%')->paginate(15);
            if(count($ResultadoRegistroUsuario)==0){
                return redirect()->route('erroralertadocumento.mensaje')->with('Alerta', "No se encontro información relacionada con el número de identificación ingresado.");
            }else{
                return view('Reporte.VCA_Reporte_Documento',compact('ResultadoRegistroUsuario'));
            }
        } catch (\Exception $e) {
            return redirect()->route('erroralertadocumento.mensaje')->with('Fallo', "Fallo el cargue de la informacón de los usuarios filtrados.");
        }
    }

    public function Mostrar_Errores_Alertas(){
        $ResultadoRegistroUsuario = array();
        return view('Reporte.VCA_Reporte_Documento',compact('ResultadoRegistroUsuario'));
    }

    public function Generar_Reporte_Excel_Fecha(Request $request){
        return Excel::download(new Reporte_Excel_Fecha($request->input('VCA_Fecha_Inicial'),$request->input('VCA_Fecha_Final')),'Reporte Fecha.xlsx');
    }
}
