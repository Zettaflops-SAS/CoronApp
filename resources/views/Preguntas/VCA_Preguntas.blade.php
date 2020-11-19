@extends('adminlte::layouts.Encabezado.VCA_Encabezado')
<br>
<br>
<br>
<div class="row">
	<div class="col-md-3">
  	</div>
	<div class="col-md-6">
		<div class="col-md-2">
	  	</div>
	  	<div class="col-md-8">
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
	  	</div>
	</div>
</div>
<center></center><div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4" style="background-color: #256F9B;border-radius: 10px;">
    <form role="form" action="/usuarios/informacionpreguntas/guardarrespuesta" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" name="VCA_Id_Pregunta" value="{{$ResultadoPregunta->PK}}">
      <input type="hidden" name="VCA_Id_Usuario" value="{{$IdUsuario}}">
      <div <?php  if(session('Fallo')) { ?> class="box box-danger" <?php  }else{ ?> class="box box-success" <?php } ?>>
        <br>
        <div class="box-header with-border">
          <center><img class="img-responsive" src="{{ asset($ResultadoPregunta->RutaImagen) }}" alt=""></center>
        </div>
        <div class="box-header with-border">
          <h4 class="box-title" style="color:black;text-align: justify;"><strong>{{$ResultadoPregunta->Pregunta}}</strong></h4>
          <div class="box-tools pull-right">
          </div>
        </div>
        <label style="color:black;">Marque la respuesta correcta</label>
        <div class="box-body">
          <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-8">
              <div class="form-group">
              	<input type="radio" id="VCA_Respuesta1" name="VCA_Respuesta" value="1" required="">
  				<label for="VCA_Respuesta1" style="color:black;">{{$Respuesta1}}</label><br>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-8">
              <div class="form-group">
              	<input type="radio" id="VCA_Respuesta2" name="VCA_Respuesta" value="2" required="">
  				<label for="VCA_Respuesta2" style="color:black;">{{$Respuesta2}}</label><br>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-8">
              <div class="form-group">
              	<input type="radio" id="VCA_Respuesta3" name="VCA_Respuesta" value="3" required="">
  				<label for="VCA_Respuesta3" style="color:black;">{{$Respuesta3}}</label><br>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-8">
              <div class="form-group">
              	<input type="radio" id="VCA_Respuesta4" name="VCA_Respuesta" value="4" required="">
  				<label for="VCA_Respuesta4" style="color:black;">{{$Respuesta4}}</label><br>
              </div>
            </div>
          </div>
          <div class="row">
            <center><button class="btn btn-succes btn-flat" type="submit" style="color:black;">Continuar</button></center>
          </div>
        </div>
      </div>
    </form>
  </div>
</div></center>