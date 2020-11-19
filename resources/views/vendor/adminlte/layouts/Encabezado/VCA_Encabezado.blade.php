<!DOCTYPE html>
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
	    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">
	    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
	    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
	</head>
	<body data-spy="scroll" data-target="#navigation" data-offset="50">
		<div id="app" v-cloak>
		    <div id="navigation" class="navbar navbar-default navbar-fixed-top" style="background-color: #2582BA;">
		        <div class="container">
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
		                <b class="navbar-brand" style="color:black;"><a href="{{ url('/') }}" style="color:black;">CoronApp</a></b>
		            </div>
		            <div class="navbar-collapse collapse">
		                <ul class="nav navbar-nav navbar-right">
		                    @if (Auth::guest())
		                        <li><a href="{{ url('/login') }}" style="color:black;">{{ trans('adminlte_lang::message.login') }}</a></li>
		                        <li><a href="{{ url('/register') }}" style="color:black;">{{ trans('adminlte_lang::message.register') }}</a></li>
		                    @else
		                        <li><a href="/usuarios" style="color:black;">{{ Auth::user()->name }}</a></li>
		                    @endif
		                </ul>
		            </div>
		        </div>
		    </div>
		</div>
		<script src="{{ url (mix('/js/app-landing.js')) }}"></script>
		<script>
		    $('.carousel').carousel({
		        interval: 3500
		    })
		</script>
	</body>
</html>
