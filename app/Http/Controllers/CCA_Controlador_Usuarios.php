<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Validator;

class CCA_Controlador_Usuarios extends Controller
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

    public function Mostrar_Usuarios(){
    	try {
    		$ResultadoUsuarios = DB::table('users')->paginate(10);
    		return view('Usuario.VCA_Usuarios_Registrados',compact('ResultadoUsuarios'));
    	} catch (\Exception $e) {
    		return redirect()->route('erroralerta.mensaje')->with('Fallo', "Fallo el cargue de la informacón de los usuarios.");
    	}
    }

    public function Mostrar_Errores_Alertas(){
    	$ResultadoUsuarios = array();
    	return view('Usuario.VCA_Usuarios_Registrados',compact('ResultadoUsuarios'));
    }

    public function Mostrar_Usuarios_Filtrados(Request $request){
    	try {
    		$ResultadoUsuarios = DB::table('users')->where('name', 'like', '%'.$request->input('CVCA_Nombre').'%')->paginate(10);
    		if(count($ResultadoUsuarios)==0){
    			return redirect()->route('erroralerta.mensaje')->with('Alerta', "No se encontro información relacionada con el nombre ingresado.");
    		}else{
    			return view('Usuario.VCA_Usuarios_Registrados',compact('ResultadoUsuarios'));
    		}
    	} catch (\Exception $e) {
    		return redirect()->route('erroralerta.mensaje')->with('Fallo', "Fallo el cargue de la informacón de los usuarios filtrados.");
    	}
    }

    public function Mostrar_Información_Usuario($id){
    	try {
    		$ResultadoInformacionUsuarios = DB::table('users')->where('id',$id)->first();
    		return view('Usuario.VCA_Modificar_Información_Usuario',compact('ResultadoInformacionUsuarios'));
    	} catch (\Exception $e) {
    		return redirect()->route('erroralerta.mensaje')->with('Fallo', "Fallo el cargue de la vista para modificar la información del usuario.");
    	}
    }

    public function Modificar_Informacion(Request $request){
    	try {
    		$ResultadoValidacion=Validator::make($request->all(),[
	            'VCA_Contrasena' => 'required|min:8',
	    	]);
	    	if($ResultadoValidacion->fails()){
	    		return redirect()->route('errorexito.mensaje',['id'=>$request->input('VCA_ID')])->with('Fallo', "El campo contraseña es obligatorio y debe contener minimo 8 caracteres.");
	    	}else{
	    		$FechaModificacion =date('Y-m-d H:i:s');
	    		$ResultadoModificacion = DB::table('users')->where('id', $request->input('VCA_ID'))->update(['password' => bcrypt($request->input('VCA_Contrasena')), 'updated_at' => $FechaModificacion]);
	    		return redirect()->route('errorexito.mensaje',['id'=>$request->input('VCA_ID')])->with('Exito', "Éxito, la contraseña a sido cambiada.");
	    	}
    	} catch (\Exception $e) {
    		return redirect()->route('errorexito.mensaje',['id'=>$request->input('VCA_ID')])->with('Fallo', "Error al intentar modificar la información.");
    	}
    }

    public function Archivar_Usuario($id){
    	try {
    		$FechaModificacion =date('Y-m-d H:i:s');
    		$ResultadoArchivacion = DB::table('users')->where('id', $id)->update(['estado' => "ARCHIVADO", 'updated_at' => $FechaModificacion]);
    		return redirect()->route('usuarios.mensaje')->with('Exito', "Éxito, se archivo el usuario.");
    	} catch (\Exception $e) {
    		return redirect()->route('usuarios.mensaje')->with('Fallo', "Fallo la archivación del usuario.");
    	}
    }

    public function Desarchivar_Usuario($id){
    	try {
    		$FechaModificacion =date('Y-m-d H:i:s');
    		$ResultadoDesarchivacion = DB::table('users')->where('id', $id)->update(['estado' => "ACTIVO", 'updated_at' => $FechaModificacion]);
    		return redirect()->route('usuarios.mensaje')->with('Exito', "Éxito, se desarchivo el usuario.");
    	} catch (\Exception $e) {
    		return redirect()->route('usuarios.mensaje')->with('Fallo', "Fallo la desarchivación del usuario.");
    	}
    }

    public function Ver_Informacion($id){
    	try {
    		$ResultadoInformacionUsuarios = DB::table('users')->where('id',$id)->first();
    		return view('Usuario.VCA_Ver_Informacion_Usuario',compact('ResultadoInformacionUsuarios'));
    	} catch (\Exception $e) {
    		return redirect()->route('usuarios.mensaje')->with('Fallo', "Fallo el cargue de la vista para ver la información del usuario.");
    	}
    }
}
