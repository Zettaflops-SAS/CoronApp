<?php

/**
*Ruta encargada de cargar todas las rutas encargadas de manejar el sistema de login
*/
Auth::routes();

/**
*Ruta encargada de cargar la vista principal de la pagina
*/

Route::get('/', function () {
    return view('welcome');
});

//-------------------Esta sección se encarga de toda la administracion con respecto a los usuarios--------------------------------

/**
*Esta ruta permite ver todos los usuarios registrados en el sistema
*/
Route::get('/usuarios', 'CCA_Controlador_Usuarios@Mostrar_Usuarios')->name('usuarios.mensaje');

/**
*Esta ruta permite ver todos los erroes o alertas que pueden suceder con respecto a los usuarios
*/
Route::get('/usuarios/erroralerta', 'CCA_Controlador_Usuarios@Mostrar_Errores_Alertas')->name('erroralerta.mensaje');

/**
*Esta ruta permite ver los usuarios que se filtraron
*/
Route::post('/usuarios/filtrados', 'CCA_Controlador_Usuarios@Mostrar_Usuarios_Filtrados');

/**
*Esta ruta permite cargar la vista donde se puede modificar la información del usuario
*/
Route::get('/usuarios/modificar/{id}', 'CCA_Controlador_Usuarios@Mostrar_Información_Usuario')->name('modificar.mensaje');

/**
*Esta ruta permite ver los usuarios que se filtraron
*/
Route::post('/usuarios/modificar/modificarinformacion', 'CCA_Controlador_Usuarios@Modificar_Informacion');

/**
*Esta ruta permite ver todos los erroes o alertas que pueden suceder cuando se quiere modificar la información
*del usuario
*/
Route::get('/usuarios/modificar/modificarinformacion/errorexito/{id}', 'CCA_Controlador_Usuarios@Mostrar_Información_Usuario')->name('errorexito.mensaje');

/**
*Esta ruta permite archivar un usuario en especifico
*/
Route::get('/usuarios/archivar/{id}', 'CCA_Controlador_Usuarios@Archivar_Usuario')->name('archivar.mensaje');

/**
*Esta ruta permite desarchivar un usuario en especifico
*/
Route::get('/usuarios/desarchivar/{id}', 'CCA_Controlador_Usuarios@Desarchivar_Usuario')->name('desarchivar.mensaje');

/**
*Esta ruta permite ver la información de un usuario en especifico
*/
Route::get('/usuarios/verinformacion/{id}', 'CCA_Controlador_Usuarios@Ver_Informacion')->name('verinformacion.mensaje');

//----------------------------------------------Fin de la sección---------------------------------------------------------------

//-------------------Esta sección se encarga de toda la administracion de los fallos de autorización--------------------------------

/**
*Esta ruta carga la vista donde se puede ver el error de autorizacion
*/
Route::get('/errorautorizacion', 'CCA_Controlador_Errores_Autorizacion@Error_Autorización')->name('errorautorizacion');

//----------------------------------------------Fin de la sección---------------------------------------------------------------

//---------------Esta sección se encarga de toda la administracion de las preguntas propuestas al usuario-------------------------

/**
*Esta ruta se encarga de mostrar la vista donde se puede ingresar la información para poder llenar la información
*de las preguntas
*/
Route::get('/usuarios/informacionpreguntas', 'CCA_Controlador_Preguntas@Vista_Registro_Informacion_Usuario')->name('informacionpreguntas.mensaje');

/**
*Esta ruta permite guardar la información del registro del usuario (el registro para poder responder las
*preguntas)
*/
Route::post('/usuarios/informacionpreguntas/guardarinformacion', 'CCA_Controlador_Preguntas@Guardar_Informacion_Registro');

/**
*Esta ruta se encarga de mostrar la vista con la pregunta que se debe responder
*/
Route::get('/usuarios/preguntas/{NumeroPregunta}/{IdUsuario}', 'CCA_Controlador_Preguntas@Mostrar_Preguntas')->name('preguntas.mensaje');

/**
*Esta ruta permite guardar la respuesta de la pregunta en la cual se encuentra el usuario
*/
Route::post('/usuarios/informacionpreguntas/guardarrespuesta', 'CCA_Controlador_Preguntas@Guardar_Respuesta');

//----------------------------------------------Fin de la sección---------------------------------------------------------------

//----------------------------Esta sección se encarga de toda la administracion de los reportes---------------------------------

/**
*Esta ruta permite ver el reporte grafico de las preguntas y respuestas
*/
Route::get('/reportegrafico', 'CCA_Controlador_Reportes@Mostrar_Reporte_Grafico')->name('reportegrafico.mensaje');

/**
*Esta ruta permite consultar las estadisticas de una pregunta en especifico
*/
Route::post('/reportegrafico/reportepregunta', 'CCA_Controlador_Reportes@Generar_Estadistica_Pregunta');

/**
*Esta ruta me permite generar el reporte de en excel de las preguntas
*/
Route::get('/reportegrafico/reportepregunta/reporteexcel/{IdPregunta}', 'CCA_Controlador_Reportes@Generar_Reporte_Excel_Preguntas')->name('reporteexcel.mensaje');

/**
*Esta ruta me permite ver la vista donde se puede ver los filtros para generar los reportes generales
*/
Route::get('/reportedocumento', 'CCA_Controlador_Reportes@Mostrar_Reporte_Documento')->name('reportedocumento.mensaje');

/**
*Permite generar el archivo PDF donde se puede ver el informe detallado del usuario
*/
Route::get('/reportedocumento/informedetallado/{IdUsuario}', 'CCA_Controlador_Reportes@Generar_Reporte_PDF')->name('informedetallado.mensaje');

/**
*Esta ruta permite consultar los usuarios registrados pero filtrados
*/
Route::post('/reportedocumento/usuariosfiltrados', 'CCA_Controlador_Reportes@Mostrar_Usuarios_Filtrados');

/**
*Esta ruta permite ver todos los erroes o alertas que pueden suceder con respecto la generación de reportes graficos
*/
Route::get('/reportedocumento/erroralertadocumento', 'CCA_Controlador_Reportes@Mostrar_Errores_Alertas')->name('erroralertadocumento.mensaje');

/**
*Esta ruta permite generar el reporte de excel donde se puede ver todos los usuarios registrados en un rango de fechas
*/
Route::post('/reportedocumento/informedetallado/reporteexcel', 'CCA_Controlador_Reportes@Generar_Reporte_Excel_Fecha');

//----------------------------------------------Fin de la sección---------------------------------------------------------------

