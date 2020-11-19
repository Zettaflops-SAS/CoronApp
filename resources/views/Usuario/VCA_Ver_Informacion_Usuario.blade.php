@extends('adminlte::layouts.app')
@section('htmlheader_title')
	Modificar Información del Usuario
@endsection
@section('main-content')

<center></center><div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-5">
   
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
                <center><label>Fecha de Creación</label></center>
                <input class="form-control" required type="datetime" name="VCA_Fecha_Creacion" value="{{$ResultadoInformacionUsuarios->created_at}}" readonly="readonly">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <center><label>Fecha de la Ultima Modificación</label></center>
                <input class="form-control" required type="datetime" name="VCA_Fecha_Modificacion" value="{{$ResultadoInformacionUsuarios->updated_at}}" readonly="readonly">
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div></center>
@endsection