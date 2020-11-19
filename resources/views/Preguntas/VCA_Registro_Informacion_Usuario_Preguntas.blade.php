@extends('adminlte::layouts.Encabezado.VCA_Encabezado')
<br>
<br>
<br>
<br>
<div class="row">
	<div class="col-md-4">
  	</div>
  	<div class="col-md-5">
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
<center></center><div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-5" style="background-color: #369430;">
    <form role="form" action="/usuarios/informacionpreguntas/guardarinformacion" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div <?php  if(session('Fallo')) { ?> class="box box-danger" <?php  }else{ ?> class="box box-success" <?php } ?>>
        <div class="box-header with-border">
          <center><h1 class="box-title"><strong>Información Personal<strong></h1></center>
          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label style="color:black;">Nombre Completo</label>
                <input class="form-control" required type="text" name="VCA_Nombre_Completo">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label style="color:black;">Correo Electronico</label>
                <input class="form-control" required type="email" name="VCA_Correo_Electronico">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label style="color:black;">Tipo de documento</label>
                <select class="form-control select2" name="VCA_Tipo_Documento" data-placeholder="Select a State" required>
        					<option value="1">Cedula de Ciudadanía</option>
        					<option value="2">Cedula de Extranjería</option>
        					<option value="2">Tarjeta de Identidad</option>
        				</select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label style="color:black;">Número de documento</label>
                <input class="form-control" required type="number" name="VCA_Numero_Documento" min="0">
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
