@extends('adminlte::layouts.app')
@section('htmlheader_title')
  Usuarios Registrados
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

<div <?php  if(session('Fallo')) { ?> class="box box-danger" <?php  }else{ ?> <?php  if(session('Alerta')) { ?> class="box box-warning" <?php  }else{ ?> class="box box-success" <?php }} ?>>
  <div class="box-header">
    <center><h3 class="box-title">Usuarios Registrados</h3></center>
  </div>
  <div class="box-body">
    <form role="form" action="/usuarios/filtrados" method="POST">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-2">
          <input type="text" name="CVCA_Nombre" class="form-control pull-right" placeholder="Nombre Completo" required>
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
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Correo Electronico</th>
            <th>Estado</th>
            <th>Modificar Información</th>
            <th>Archivar Información</th>
            <th>Ver Información</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ResultadoUsuarios as $apuntador)
            <tr>
              <td class="active">{{$apuntador->id}}</td>
              <td class="active">{{$apuntador->name}}</td>
              <td class="active">{{$apuntador->email}}</td>
              <td class="active">
                @if($apuntador->estado=="ACTIVO")
                  <span class="label label-success">{{$apuntador->estado}}</span>
                @else 
                  <span class="label label-danger">{{$apuntador->estado}}</span>
                @endif
              </td>
              <td class="active"><button type="button" class="btn btn-block btn-warning btn-sm" onclick="location.href='{{ url('/usuarios/modificar/'.$apuntador->id.'/') }}'"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Modificar</button></td>
              <td class="active">
                @if($apuntador->estado=="ACTIVO")
                  <button type="button" class="btn btn-block btn-danger btn-sm" onclick="location.href='{{ url('/usuarios/archivar/'.$apuntador->id.'/') }}'"><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Archivar</button>
                @else 
                  <button type="button" class="btn btn-block btn-success btn-sm" onclick="location.href='{{ url('/usuarios/desarchivar/'.$apuntador->id.'/') }}'"><i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Desarchivar</button>
                @endif
              </td>
              <td class="active">
                <button type="button" class="btn btn-block btn-primary btn-sm" onclick="location.href='{{ url('/usuarios/verinformacion/'.$apuntador->id.'/') }}'"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ver</button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <?php 
    if(!empty($ResultadoUsuarios)) {
  ?>
      <center>{!! $ResultadoUsuarios->render() !!}</center>
  <?php
    }
  ?>
</div>

@endsection