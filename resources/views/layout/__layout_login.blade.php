<!DOCTYPE html>
  <html>
  <head>
    <title>@yield('titulo')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <header>
      <nav>
        <div class="nav-wrapper indigo accent-1">
         <a href="#!" class="brand-logo center">Cotação de Compra</a>
       </div>
     </nav>

  </header>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!--JavaScript at end of body for optimized loading-->
<!-- Compiled and minified JavaScript -->
<footer class="page-footer indigo accent-1">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <img class="img-responsive" data-caption="Compass TI Logo" width="210" src="http://www.compassti.com.br/wp-content/uploads/2019/02/cropped-Logo-Original-Transparente-Texto-Lateral-1.png">
        <h6 class="grey-text text-lighten-4">O caminho certo em sistemas</h6>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Acesse nossas paginas</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="http://www.compassti.com.br/">Site</a></li>
          <li><a class="grey-text text-lighten-3" href="https://www.facebook.com/compasstiguarapuava/">Compass no Facebook</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © 2019 Compass TI Ltda.

    </div>
  </div>
</footer>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('select').formSelect();
    $(".dropdown-button").dropdown();
  });
</script>
</body>
</html>
