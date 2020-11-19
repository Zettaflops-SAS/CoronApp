<!DOCTYPE html>
<html>
<head>
	<title>Informe Detallado</title>
</head>
<body>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-5">
			<center><img src='../public/img/Imagen_Principal_PDF.jpg' width='400' height='200'></center>
		</div>
	</div>
	<h2 style="margin-left: 42%;margin-bottom: 1px;font: oblique bold 120% cursive;">Encuesta</h2>
	<div style="margin-left: 8%;">
		<div class="row">
			<div class="col-md-5">
				<p style="width: 90%;text-align: justify;font-family: 'Homer Simpson UI';">El usuario  registrado con el nombre de <strong>{{$ResultadoRegistro->NombreCompleto}}</strong> identificado con el tipo de documento
					@if($ResultadoRegistro->TipoIdentificacion==1)
						<strong>Cedula de Ciudadanía</strong>
					@else
						@if($ResultadoRegistro->TipoIdentificacion==2)
							<strong>Cedula de Extranjería</strong>
						@else
							@if($ResultadoRegistro->TipoIdentificacion==3)
								<strong>Tarjeta de Identidad</strong>
							@endif
						@endif
					@endif
					y número <strong>{{$ResultadoRegistro->NumeroIdentificacion}}</strong> respondio hasta la pregunta <strong>{{$ResultadoRegistro->PreguntaActual}}</strong>. El estado de la encuesta es
					@if($ResultadoRegistro->Estado=="ACTIVO")
						<strong><mark style="background-color: #009C24;">{{$ResultadoRegistro->Estado}}</mark>.</strong>
					@else
						@if($ResultadoRegistro->Estado=="ARCHIVADO")
							<strong><mark style="background-color: #BB3328;">{{$ResultadoRegistro->Estado}}</mark>.</strong>
						@endif
					@endif
					A continuación se adjunta las preguntas propuestas por el sistema y su correspondiente respuesta.</p>
			</div>
		</div>
	</div>
	<div style="margin-left: 8%;">
		<div class="row">
			<div class="col-md-5" style="width: 90%;text-align: justify;">
				<ol>
					@foreach ($ResultadoPregunta as $apuntador)
						<li type="disc">{{$apuntador->Pregunta}}</li>
							<ol>
								<br>
								@foreach ($ResultadoRespuesta as $apuntador_auxiliar)
									@if($apuntador->PK<=$ResultadoRegistro->PreguntaActual && $apuntador_auxiliar->FK_MCA_Preguntas==$apuntador->PK)
										@if($apuntador_auxiliar->RespuestaCorrecta==1)
											<li><mark style="background-color: #009B24;">{{$apuntador_auxiliar->Respuesta}}</mark></li>
										@else
											<li>{{$apuntador_auxiliar->Respuesta}}</li>
										@endif
									@else
										@if($apuntador_auxiliar->FK_MCA_Preguntas==$apuntador->PK)
											<li>{{$apuntador_auxiliar->Respuesta}}</li>
										@endif
									@endif
								@endforeach
								<br>
								<br>
							</ol>
					@endforeach
				</ol>
			</div>
		</div>
	</div>
</body>
</html>