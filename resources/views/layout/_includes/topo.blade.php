<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/aguarde.css')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" charset="UTF-8">

</head>

<body>
<header>
    <nav class="nav-extended">
        <div class="nav-wrapper indigo darken-4">
            <a href="/" class="brand-logo">Integrador Cotação -> RpInfo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/">Inicio</a></li>
            </ul>
        </div>
    </nav>
</header>
