@extends('adminlte::layouts.app')
@section('htmlheader_title')
	Falta de autorización
@endsection
@section('main-content')
<div class="error-page">
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Error de autorización.</h3>
            <p style="text-align: justify;">
                Usted no cuenta con la autorización para ingresar a esta opción ya que su cuenta se encuentra archivada, por favor vuelva a la <a href="{{ url('/') }}">pagina de inicio.</a>
            </p>
    </div>
</div>
@endsection