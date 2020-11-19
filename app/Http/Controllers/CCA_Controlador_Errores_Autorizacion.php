<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CCA_Controlador_Errores_Autorizacion extends Controller
{

    /**
	*middleware encargado de validar que el usuario este logeado antes de poder
	*usar el controlador
	*/
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Error_Autorización(){
    	return view('Autorizacion.VCA_Error_Autorizacion');
    }
}
