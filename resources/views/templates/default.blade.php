<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Libera Espacios</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/materialize.css') }}" media="screen" />
        <script defer src="https://use.fontawesome.com/3346f99067.js"></script>

        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}?v={{rand()}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}?v={{rand()}}" media="screen" />

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        @yield('header')

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <header class="valign-wrapper">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="homepage-banner-warpper">
                  <div class="homepage-banner-content">
                  <div class="group-title">
                    <h1 class="banner title">Descubre</h1>
                    <h4 class="sub-banner">&nbsp;los mejores espacios de la ciudad </h4>
                  </div>
                </div>
                </div>
              </div>
              <!--div class="col-md-2">
                <a href="{{url('/')}}">Libera Espacios Logo<img src="{{url('img/logo.png')}}" alt="logo" class="img-responsive"></a>
              </div>
              <div class="col-md-10">
                <ul id="dropdown1" class="dropdown-content">
                  <li><a href="{{url('/perfil')}}">Perfil</a></li>
                  
                  <li><a href="{{url('/salir')}}">Salir</a></li>
                </ul>
                <nav>
                  <div class="nav-wrapper">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                      @if (Auth::guest())
                        <li><a href="{{url('/entrar')}}">Entrar</a></li>
                        <li><a href="{{url('/registro')}}">Registrar</a></li>
                      @else
                      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Mi cuenta</a></li>
                      @endif
                    </ul>
                  </div>
                </nav>
              </div-->
            </div>
          </div>
        </header>


        @yield('pagecontent')
       

      

      <footer class="page-footer blue darken-3">
          
          <div class="footer-copyright">
            <div class="container">
            © 2018 Todos los derechos reservados
            </div>
          </div>
        </footer>


      <script type="text/javascript" src="{{ url('js/vendor/bootstrap.min.js') }}"></script>
      <script type="text/javascript" src="{{ url('js/vendor/materialize.js') }}"></script>

      <script type="text/javascript" src="{{ url('js/main.js') }}"></script>
      <script>
          $(document).ready(function() {  
            $('.collapsible').collapsible();
            $(".button-collapse").sideNav();
            $('.collapsible').collapsible();
            $('.modal').modal();
            $('.materialboxed').materialbox();
            $('.tooltipped').tooltip({delay: 50});
            $('.select').material_select();
            $('.datepicker').pickadate({
              selectMonths: true, // Creates a dropdown to control month
              selectYears: 100, // Creates a dropdown of 15 years to control year,
              today: 'Hoy',
              clear: 'Limpiar',
              close: 'Ok',
              closeOnSelect: false // Close upon selecting a date,
            });


            $('.timepicker').pickatime({
                    default: 'now', 
                    fromnow: 0,       
                    twelvehour: false, 
                    donetext: 'OK', 
                    cleartext: 'Limpiar', 
                    canceltext: 'Cancelar', 
                    autoclose: false, 
                    ampmclickable: true
                    
                  });

            

            
            
@if (Session::get('toast'))

  var url="{{url('/carrito')}}"
  var $toastContent = $('<span>{{ Session::get('toast') }}</span>').add($('<a href="'+url+'" class="btn-flat toast-action">Ir a carrito</a>'));
  Materialize.toast($toastContent, 10000);

@endif
         


          });
        </script>

    </body>
</html>