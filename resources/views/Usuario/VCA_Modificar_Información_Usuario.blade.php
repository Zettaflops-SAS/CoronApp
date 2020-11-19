@extends('adminlte::layouts.app')
@section('htmlheader_title')
	Modificar Información del Usuario
@endsection
@section('main-content')

@if (session('Fallo'))
  <div class="alert alert-danger">
    <center>{{ session('Fallo') }}</center>
  </div>
@else
  @if (session('Exito'))
    <div class="alert alert-success">
      <center>{{ session('Exito') }}</center>
    </div>
  @endif
@endif
<center></center><div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-5">
    <form role="form" action="/usuarios/modificar/modificarinformacion" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
       <input class="form-control" type="hidden" name="VCA_ID" value="{{$ResultadoInformacionUsuarios->id}}" readonly="readonly">
      <div <?php  if(session('Fallo')) { ?> class="box box-danger" <?php  }else{ ?> class="box box-success" <?php } ?>>
        <div class="box-header with-border">
          <center><h1 class="box-title"><strong>Información del Usuario<strong></h1></center>
          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <center><label>Nombre Completo</label></center>
                <input class="form-control" required type="text" name="VCA_Nombre_Completo" value="{{$ResultadoInformacionUsuarios->name}}" readonly="readonly">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <center><label>Correo Electronico</label></center>
                <input class="form-control" required type="email" name="VCA_Correo_Electronico" value="{{$ResultadoInformacionUsuarios->email}}" readonly="readonly">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <center><label>Constraseña</label></center>
                <input class="form-control" required type="password" name="VCA_Contrasena">
              </div>
            </div>
          </div>
          <div class="row">
            <center><button class="btn btn-warning btn-flat" type="submit">Enviar Información</button></center>
          </div>
        </div>
      </div>
    </form>
  </div>
</div></center>
@endsection