@extends('adminlte::layouts.app')
@section('htmlheader_title')
	Reporte Gráfico
@endsection
@section('main-content')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="row">
	<div class="col-md-3">
	</div>
  	<div class="col-md-9">
    	<div id="piechart_3d" class="table-responsive" style="height: 390px;"></div>
    	<br>
  	</div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Preguntas Resueltas', 'Preguntas No Resueltas'],
            ['Resueltas',1],
            ['No Resueltas',2]
        ]);
        var options = {
            title: 'Preguntas Resueltas VS Preguntas No Resueltas',
            is3D: true,
            width:500,
            height:380
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>

@if (session('Fallo'))
  	<div class="alert alert-danger">
    	<center>{{ session('Fallo') }}</center>
  	</div>
@endif

<script>
	function Buscar_Informacion_Pregunta(IdPregunta){
		$.ajaxSetup({
	    headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	  });
	  $.ajax({
	    type:'POST',
	    url:"{{ url('/reportegrafico/reportepregunta') }}",
	    data:{
	     	VCA_Numero_Pregunta:IdPregunta
	    },
	    success:function(Respuesta){

        var Insertar_Html = document.getElementById("reporte_grafico");
        Insertar_Html.innerHTML="<div class='box box-warning'>"
          +"<div class='box-header'>"
            +"<h3 class='box-title'>Reporte</h3>"
          +"</div>"
          +"<div class='box-body'>"
            +"<div class='table-responsive'>"
              +"<center><p style='font-family: 'Homer Simpson UI';'><font size=4>El sistema actualmente tiene <strong>"+Respuesta[0]+"</strong> preguntas que se encuentran en la pregunta <strong>"+Respuesta[1]+"</strong>. El sistema actualmente tiene <strong>"+Respuesta[2]+"</strong> preguntas registradas en el sistema. Para descargar el reporte de excel &nbsp;&nbsp;&nbsp;<i class='fa fa-book' aria-hidden='true'>&nbsp;<a href='http://192.168.10.10/reportegrafico/reportepregunta/reporteexcel/"+Respuesta[1]+"'>PRESIONE AQUI.</a></i></font></p></center>"
            +"</div>"
          +"</div>"
        +"</div>";
			}
	  });	
	}
</script>
<div id="reporte_grafico">
</div>
<div <?php  if(session('Fallo')) { ?> class="box box-danger" <?php  }else{ ?> <?php  if(session('Alerta')) { ?> class="box box-warning" <?php  }else{ ?> class="box box-success" <?php }} ?>>
  	<div class="box-header">
    	<center><h3 class="box-title">Preguntas Registradas</h3></center>
  	</div>
  	<div class="box-body">
    	<div class="table-responsive">
      		<table class="table table-bordered table-hover">
        		<thead>
          			<tr>
            			<th>N° de Pregunta</th>
            			<th>Enunciado</th>
            			<th>Ver Estadisticas</th>
          			</tr>
        		</thead>
        		<tbody>
          			@foreach ($ResultadoPreguntas as $apuntador)
            			<tr>
              				<td class="active">{{$apuntador->PK}}</td>
              				<td class="active">{{$apuntador->Pregunta}}</td>
              				<td class="active">
              					<button type="button" class="btn btn-block btn-primary btn-sm" onclick="Buscar_Informacion_Pregunta({{$apuntador->PK}});" role="button"><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ver Estadisticas</button>
              				</td>
            			</tr>
          			@endforeach
        		</tbody>
      		</table>
    	</div>
  	</div>
  	<?php 
    	if(!empty($ResultadoPreguntas)) {
  	?>
      		<center>{!! $ResultadoPreguntas->render() !!}</center>
  	<?php
    	}
  	?>
</div>
@endsection