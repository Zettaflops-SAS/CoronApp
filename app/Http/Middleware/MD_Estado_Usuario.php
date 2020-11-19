<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use DB;

class MD_Estado_Usuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ResultadoEstadoUsuario = DB::table('users')->where('id',Auth::user()->id)->first();
        if($ResultadoEstadoUsuario->estado=="ACTIVO"){
            return $next($request);
        }else{
            return redirect()->route('errorautorizacion');
        }
    }
}
