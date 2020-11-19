<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CCA_Controlador_Preguntas extends Controller
{
    
    public function Vista_Registro_Informacion_Usuario(){
    	return view('Preguntas.VCA_Registro_Informacion_Usuario_Preguntas');
    }

    public function Guardar_Informacion_Registro(Request $request){
    	
    	try {

    		$ResultadoRegistro = DB::table('MCA_Informacion_Registro')->where('NumeroIdentificacion',$request->input('VCA_Numero_Documento'))->where('TipoIdentificacion',$request->input('VCA_Tipo_Documento'))->where('Estado','ACTIVO')->first();

	    	if(is_null($ResultadoRegistro)){
	    		$FechaCreacion =date('Y-m-d H:i:s');
	    		$GuardarInformacionSolicitudPrestamo = DB::insert('INSERT INTO MCA_Informacion_Registro (NombreCompleto, Email,TipoIdentificacion,NumeroIdentificacion,PreguntaActual,Estado,created_at) VALUES (?,?,?,?,?,?,?)', [$request->input('VCA_Nombre_Completo'), $request->input('VCA_Correo_Electronico'),$request->input('VCA_Tipo_Documento'),$request->input('VCA_Numero_Documento'),1,'ACTIVO',$FechaCreacion]);

	    		$ResultadoPKInsercion = DB::table('MCA_Informacion_Registro')->where('NumeroIdentificacion',$request->input('VCA_Numero_Documento'))->where('TipoIdentificacion',$request->input('VCA_Tipo_Documento'))->where('Estado','ACTIVO')->first();
	    		return redirect()->route('preguntas.mensaje',['NumeroPregunta' => 1,'IdUsuario' => $ResultadoPKInsercion->PK]);

	    	}else{

	    		return redirect()->route('preguntas.mensaje',['NumeroPregunta' => $ResultadoRegistro->PreguntaActual,'IdUsuario' => $ResultadoRegistro->PK])->with('Exito', "Éxito, usted ya se encuentra registrado, por favor continue resolviendo la pregunta ".$ResultadoRegistro->PreguntaActual.".");
	    	}

    	} catch (\Exception $e) {
    		return redirect()->route('informacionpreguntas.mensaje')->with('Fallo', "Fallo, no se pudo guardar la información.");
    	}
    }

    public function Mostrar_Preguntas($NumeroPregunta,$IdUsuario){
    	
    	try {
    		$ResultadoPregunta = DB::table('MCA_Preguntas')->where('PK',$NumeroPregunta)->first();
	    	$ResultadoRespuesta = DB::table('MCA_Respuestas')->where('FK_MCA_Preguntas',$ResultadoPregunta->PK)->get();
	    	$Respuesta1=null;
	    	$Respuesta2=null;
	    	$Respuesta3=null;
	    	$Respuesta4=null;

	    	foreach ($ResultadoRespuesta as $apuntador) {
	    		if(is_null($Respuesta1)){
	    			$Respuesta1=$apuntador->Respuesta;
	    		}else{
	    			if(is_null($Respuesta2)){
		    			$Respuesta2=$apuntador->Respuesta;
		    		}else{
		    			if(is_null($Respuesta3)){
			    			$Respuesta3=$apuntador->Respuesta;
			    		}else{
			    			if(is_null($Respuesta4)){
				    			$Respuesta4=$apuntador->Respuesta;
				    		}
			    		}
		    		}
	    		}
	    	}
	    	return view('Preguntas.VCA_Preguntas',compact('ResultadoPregunta','Respuesta1','Respuesta2','Respuesta3','Respuesta4','IdUsuario')); 
    	} catch (\Exception $e) {
    		return redirect()->route('informacionpreguntas.mensaje')->with('Fallo', "Fallo, no se pudo mostrar la pregunta a resolver.");
    	}
    }

    public function Guardar_Respuesta(Request $request){

    	try {
    		$ResultadoRespuesta = DB::table('MCA_Respuestas')->where('FK_MCA_Preguntas',$request->input('VCA_Id_Pregunta'))->where('NumeroPregunta',$request->input('VCA_Respuesta'))->first();

	    	if($ResultadoRespuesta->RespuestaCorrecta==1){

	    		$TotalPregunta = DB::table('MCA_Preguntas')->count();
	    		if($TotalPregunta>=$request->input('VCA_Id_Pregunta')+1){

	    			$ResultadoModificacion = DB::table('MCA_Informacion_Registro')->where('PK', $request->input('VCA_Id_Usuario'))->update(['PreguntaActual' => $request->input('VCA_Id_Pregunta')+1]);
	    			return redirect()->route('preguntas.mensaje',['NumeroPregunta' => $request->input('VCA_Id_Pregunta')+1,'IdUsuario' => $request->input('VCA_Id_Usuario')]);
	    		}else{

	    			$ResultadoModificacion = DB::table('MCA_Informacion_Registro')->where('PK', $request->input('VCA_Id_Usuario'))->update(['Estado' => 'ARCHIVADO']);
	    			return redirect()->route('informacionpreguntas.mensaje')->with('Exito', "Éxito, se contesto todas las preguntas.");
	    		}
	    	}else{
	    		return redirect()->route('preguntas.mensaje',['NumeroPregunta' => $request->input('VCA_Id_Pregunta'),'IdUsuario' => $request->input('VCA_Id_Usuario')])->with('Fallo', "La respuesta marcada es incorrecta.");
	    	}
    	} catch (\Exception $e) {
    		return redirect()->route('preguntas.mensaje',['NumeroPregunta' => $request->input('VCA_Id_Pregunta'),'IdUsuario' => $request->input('VCA_Id_Usuario')])->with('Fallo', "Fallo, no se pudo almacenar la respuesta.");
    	}
    }
}
