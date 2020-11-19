<table>
    <thead>
    <tr>
        <center><th style="background-color: #8C908A;width: 30px;text-align: center;">Nombre Completo</th></center>
        <center><th style="background-color: #8C908A;width: 30px;text-align: center;">Correo Electronico</th></center>
        <center><th style="background-color: #8C908A;width: 30px;text-align: center;">Tipo de Identificación</th></center>
        <center><th style="background-color: #8C908A;width: 30px;text-align: center;">Número de Identificación</th></center>
        <center><th style="background-color: #8C908A;width: 20px;text-align: center;">Pregunta Actual</th></center>
        <center><th style="background-color: #8C908A;width: 20px;text-align: center;">Estado</th></center>
    </tr>
    </thead>
    <tbody>
    @foreach($ResultadoPreguntas as $apuntador)
        <tr>
            <td style="background-color: #09AD60;width: 30px;text-align: center;">{{ $apuntador->NombreCompleto }}</td>
            <td style="background-color: #09AD60;width: 30px;text-align: center;">{{ $apuntador->Email }}</td>
            @if($apuntador->TipoIdentificacion==1)
                <td style="background-color: #09AD60;width: 30px;text-align: center;">Cedula de Ciudadanía</td>
            @else
                @if($apuntador->TipoIdentificacion==2)
                    <td style="background-color: #09AD60;width: 30px;text-align: center;">Cedula de Extranjería</td>
                @else
                    @if($apuntador->TipoIdentificacion==3)
                        <td style="background-color: #09AD60;width: 30px;text-align: center;">Tarjeta de Identidad</td>
                    @endif
                @endif
            @endif
            <td style="background-color: #09AD60;width: 30px;text-align: center;">{{ $apuntador->NumeroIdentificacion }}</td>
            <td style="background-color: #09AD60;width: 20px;text-align: center;">{{ $apuntador->PreguntaActual }}</td>
            @if($apuntador->Estado=="ACTIVO")
                <td style="background-color: #009C24;width: 20px;text-align: center;">{{ $apuntador->Estado }}</td>
            @else
                @if($apuntador->Estado=="ARCHIVADO")
                    <td style="background-color: #BB3328;width: 20px;text-align: center;">{{ $apuntador->Estado }}</td>
                @endif
            @endif
        </tr>
    @endforeach
    </tbody>
</table>