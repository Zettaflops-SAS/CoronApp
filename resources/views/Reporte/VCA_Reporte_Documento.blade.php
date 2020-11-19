@extends('adminlte::layouts.app')
@section('htmlheader_title')
	Reporte Gráfico
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
  @else
    @if (session('Alerta'))
      <div class="alert alert-warning">
        <center>{{ session('Alerta') }}</center>
      </div>
    @endif
  @endif
@endif
<script>
  function fecha_inicial(){
    
    if(document.getElementById("VCA_Fecha_Final").value!=""){
      if(document.getElementById("VCA_Fecha_Inicial").value>document.getElementById("VCA_Fecha_Final").value||document.getElementById("VCA_Fecha_Inicial").value==document.getElementById("VCA_Fecha_Final").value){
        var evento = document.getElementById("mensaje_error");
        evento.innerHTML = "";

        var evento = document.getElementById("mensaje_error");
        evento.innerHTML = "<center><div class='alert alert-danger'>Error, la fecha inicial debe ser menor a la fecha final.</div></center>";
      }else{
        var evento = document.getElementById("mensaje_error");
        evento.innerHTML = "";
      }
    }
  }

  function fecha_final(){

    if(document.getElementById("VCA_Fecha_Inicial").value!=""){
      if(document.getElementById("VCA_Fecha_Inicial").value>document.getElementById("VCA_Fecha_Final").value||document.getElementById("VCA_Fecha_Inicial").value==document.getElementById("VCA_Fecha_Final").value){
        var evento = document.getElementById("mensaje_error");
        evento.innerHTML = "";

        var evento = document.getElementById("mensaje_error");
        evento.innerHTML = "<center><div class='alert alert-danger'>Error, la fecha inicial debe ser menor a la fecha final.</div></center>";
      }else{
        var evento = document.getElementById("mensaje_error");
        evento.innerHTML = "";
      }
    }
  }
</script>
<center></center><div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-5">
    <form role="form" action="/reportedocumento/informedetallado/reporteexcel" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div <?php  if(session('Fallo')) { ?> class="box box-danger" <?php  }else{ ?> class="box box-success" <?php } ?>>
        <div class="box-header with-border">
          <center><h1 class="box-title"><strong>Filtro para Reporte<strong></h1></center>
          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body">
          <div id="mensaje_error">
          </div>
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <center><label>Fecha Inicial</label></center>
                <input class="form-control" required type="date" name="VCA_Fecha_Inicial" id="VCA_Fecha_Inicial" onchange="fecha_inicial();">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <center><label>Fecha Final</label></center>
                <input class="form-control" required type="date" name="VCA_Fecha_Final" id="VCA_Fecha_Final" onchange="fecha_final();">
              </div>
            </div>
          </div>
          <div class="row">
            <center><button class="btn btn-success btn-flat" type="submit">Generar Reporte</button></center>
          </div>
        </div>
      </div>
    </form>
  </div>
</div></center>
<div <?php  if(session('Fallo')) { ?> class="box box-danger" <?php  }else{ ?> <?php  if(session('Alerta')) { ?> class="box box-warning" <?php  }else{ ?> class="box box-success" <?php }} ?>>
  	<div class="box-header">
    	<center><h3 class="box-title">Personas Registradas</h3></center>
  	</div>
  	<div class="box-body">
      <form role="form" action="/reportedocumento/usuariosfiltrados" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-2">
            <input type="number" min="1" name="CVCA_Numero_Documento" class="form-control pull-right" placeholder="N° de Identificación" required>
          </div>
          <div class="col-md-1">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>   
      </form>
      <br>
    	<div class="table-responsive">
      		<table class="table table-bordered table-hover">
        		<thead>
          			<tr>
                  <th style="text-align: center;">ID</th>
            			<th style="text-align: center;">Nombre Completo</th>
            			<th style="text-align: center;">Tipo de Identificación</th>
            			<th style="text-align: center;">Número de Documento</th>
                  <th style="text-align: center;">Estado</th>
                  <th style="text-align: center;">Informe Detallado</th>
          			</tr>
        		</thead>
        		<tbody>
          			@foreach ($ResultadoRegistroUsuario as $apuntador)
            			<tr>
                      <td class="active" style="text-align: center;">{{$apuntador->PK}}</td>
              				<td class="active" style="text-align: center;">{{$apuntador->NombreCompleto}}</td>
                      <td class="active" style="text-align: center;">
                        @if($apuntador->TipoIdentificacion==1)
                            <span class="label label-success">Cedula de Ciudadanía</span>
                        @else
                            @if($apuntador->TipoIdentificacion==2)
                                <span class="label label-success">Cedula de Extranjería</span>
                            @else
                                @if($apuntador->TipoIdentificacion==3)
                                    <span class="label label-success">Tarjeta de Identidad</span>
                                @endif
                            @endif
                        @endif
                      </td>
              				<td class="active" style="text-align: center;">{{$apuntador->NumeroIdentificacion}}</td>
              				<td class="active" style="text-align: center;">
                        @if($apuntador->Estado=="ACTIVO")
                            <span class="label label-success">{{ $apuntador->Estado }}</span>
                        @else
                            @if($apuntador->Estado=="ARCHIVADO")
                                <span class="label label-danger">{{ $apuntador->Estado }}</span>
                            @endif
                        @endif
                      </td>
                      <td class="active">
                        <button type="button" class="btn btn-block btn-primary btn-sm" onclick="location.href='{{ url('/reportedocumento/informedetallado/'.$apuntador->PK.'/') }}'"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Generar</button>
                      </td>
                  </tr>
          			@endforeach
        		</tbody>
      		</table>
    	</div>
  	</div>
  	<?php 
    	if(!empty($ResultadoRegistroUsuario)) {
  	?>
      		<center>{!! $ResultadoRegistroUsuario->render() !!}</center>
  	<?php
    	}
  	?>
</div>
@endsection