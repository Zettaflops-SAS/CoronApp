<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Julian Camilo Anzola Hincapie">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="https://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>CoronApp</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app" v-cloak>
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <b class="navbar-brand"><strong>CoronApp</strong></b>
            </div>
            <div class="navbar-collapse collapse">
                <!--<ul class="nav navbar-nav">
                    <li class="active"><a href="#home" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
                    <li><a href="#desc" class="smoothScroll">{{ trans('adminlte_lang::message.description') }}</a></li>
                    <li><a href="#showcase" class="smoothScroll">{{ trans('adminlte_lang::message.showcase') }}</a></li>
                    <li><a href="#contact" class="smoothScroll">{{ trans('adminlte_lang::message.contact') }}</a></li>
                </ul>-->
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    @else
                        <li><a href="/usuarios">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>


    <section id="home" name="home">
        <div id="headerwrap">
            <div class="container">
                <div class="row centered">
                    <div class="col-lg-12">
                        <h1 style="color: #000000;"><strong>Coronavirus</strong></h1>
                        <h3>El virus que causa la COVID‑19 se transmite principalmente a través de las gotículas generadas cuando una persona infectada tose, estornuda o espira. Estas gotículas son demasiado pesadas para permanecer suspendidas en el aire y caen rápidamente sobre el suelo o las superficies. Usted puede infectarse al inhalar el virus si está cerca de una persona con COVID‑19 o si, tras tocar una superficie contaminada, se toca los ojos, la nariz o la boca.</h3>
                        <h3><a href="{{ url('/usuarios/informacionpreguntas') }}" target="_blank" class="btn btn-lg btn-success">Responder Encuesta</a></h3>
                    </div>
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8">
                        <center><img class="img-responsive" src="{{ asset('/img/Imagen_Secundaria.jpg') }}" alt=""></center>
                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>
            </div> <!--/ .container -->
        </div><!--/ #headerwrap -->
    </section>

    <section id="desc" name="desc">
        <!-- INTRO WRAP -->
        <div id="intro">
            <div class="container">
                <div class="row centered">
                    <h1><strong>COVID-19</strong></h1>
                    <br>
                    <br>
                    <div class="col-lg-4">
                        <a href="https://twitter.com/inscolombia?lang=es" target="_blank"><img src="{{ asset('/img/intro01.png') }}" alt=""></a>
                        <a href="https://twitter.com/inscolombia?lang=es" target="_blank"><h3>Twitter</h3></a>
                        <p>Twitter del Instituto Nacional de Salud.</p>
                    </div>
                    <div class="col-lg-4">
                        <a href="https://colombiacheck.com/investigaciones/siga-el-minuto-minuto-del-avance-del-coronavirus-en-colombia-y-el-mundo" target="_blank"><img src="{{ asset('/img/intro02.png') }}" alt=""></a>
                        <a href="https://colombiacheck.com/investigaciones/siga-el-minuto-minuto-del-avance-del-coronavirus-en-colombia-y-el-mundo" target="_blank"><h3>Evolución del COVID-19</h3></a>
                        <p>Evolución del coronavirus a nivel mundial.</p>
                    </div>
                    <div class="col-lg-4">
                        <a href="https://twitter.com/inscolombia?lang=es" target="_blank"><img src="{{ asset('/img/intro03.png') }}" alt=""></a>
                        <h3>Diagramas</h3>
                        <p>Codigo fuente de la pagina web.</p>
                    </div>
                </div>
                <br>
                <hr>
            </div> <!--/ .container -->
        </div><!--/ #introwrap -->

        <!-- FEATURES WRAP -->
        <div id="features">
            <div class="container">
                <div class="row">
                    <h1 class="centered">¿Es peligroso el COVID-19?</h1>
                    <br>
                    <br>
                    <div class="col-lg-6 centered">
                        <img class="centered" src="{{ asset('/img/Estadistica_Coronavirus.jpg') }}" alt="">
                    </div>

                    <div class="col-lg-6">
                        <h3>Sintomas del Coronavirus</h3>
                        <br>
                        <!-- ACCORDION -->
                        <div class="accordion ac" id="accordion2">
                            <div class="accordion-group">
                                <div id="collapseOne" class="accordion-body collapse in">
                                    <div class="accordion-inner">
                                        <p style="text-align:justify;">
                                            La COVID-19 afecta de distintas maneras en función de cada persona. La mayoría de las personas que se contagian presentan síntomas de intensidad leve o moderada, y se recuperan sin necesidad de hospitalización.
                                            <br>
                                            <br>
                                            Otros síntomas menos comunes son los siguientes:
                                            <ol>
                                                <li>Fiebre</li>
                                                <li>Tos seca</li>
                                                <li>Cansancio</li>
                                                <li>Molestias y dolores</li>
                                                <li>Dolor de garganta</li>
                                                <li>Diarrea</li>
                                                <li>Conjuntivitis</li>
                                                <li>Dolor de cabeza</li>
                                                <li>Pérdida del sentido del olfato o del gusto</li>
                                                <li>Erupciones cutáneas o pérdida del color en los dedos de las manos o de los pies</li>
                                            </ol>
                                            Los síntomas graves son los siguientes:
                                            <br>
                                            <br>
                                            <ol>
                                                <li>Dificultad para respirar o sensación de falta de aire</li>
                                                <li>Dolor o presión en el pecho</li>
                                                <li>Incapacidad para hablar o moverse</li>
                                            </ol>
                                            <p style="text-align:justify;">Si presentas síntomas graves, busca atención médica inmediata. Sin embargo, siempre debes llamar a tu doctor o centro de atención sanitaria antes de presentarte en el lugar en cuestión.
                                            Lo recomendable es que las personas que sufran síntomas leves y tengan un buen estado de salud general se confinen en casa. De media, las personas que se contagian empiezan a presentar síntomas en un plazo de 5 a 6 días desde que se infectan, pero pueden tardar hasta 14.</p></p>
                                    </div><!-- /accordion-inner -->
                                </div><!-- /collapse -->
                            </div><!-- /accordion-group -->
                            <br>
                        </div><!-- Accordion -->
                    </div>
                </div>
            </div><!--/ .container -->
        </div><!--/ #features -->
    </section>

    <section id="showcase" name="showcase">
        <div id="showcase">
            <div class="container">
                <div class="row">
                    <h1 class="centered">Avance del Coronavirus</h1>
                    <br>
                    <div class="col-lg-8 col-lg-offset-2">
                        <div id="carousel-example-generic" class="carousel slide">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" style="background-color: #000000;" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1" style="background-color: #000000;"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2" style="background-color: #000000;"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3" style="background-color: #000000;"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <center><img src="{{ asset('/img/Grafica1.JPG') }}" alt=""></center>
                                </div>
                                <div class="item">
                                    <center><img src="{{ asset('/img/Grafica2.JPG') }}" alt=""></center>
                                </div>
                                <div class="item">
                                    <center><img src="{{ asset('/img/Grafica3.JPG') }}" alt=""></center>
                                </div>
                                <div class="item">
                                    <center><img src="{{ asset('/img/Grafica4.JPG') }}" alt=""></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div><!-- /container -->
        </div>
    </section>
    <footer>
        <div id="c">
            <div class="container">
                <p>
                    <a href="https://github.com/acacha/adminlte-laravel"></a>Proyecto desarrollado en Laravel 7 con bootstrap como complemento grafico.<br/>
                    <strong>Copyright &copy; 2020 <a href="http://www.uniminuto.edu/web/bogota-presencial" target="_blank">uniminuto.edu.co</a>.</strong> {{ trans('adminlte_lang::message.createdby') }} <a>Julian Camilo Anzola Hincapie</a>. Free Software License.
                    <br/>
                </p>

            </div>
        </div>
    </footer>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url (mix('/js/app-landing.js')) }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
