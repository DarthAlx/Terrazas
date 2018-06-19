<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Tu Lugar Ideal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/materialize.css') }}" media="screen" />
        <script defer src="https://use.fontawesome.com/3346f99067.js"></script>

        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}?v={{rand()}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}?v={{rand()}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/grid.css') }}?v={{rand()}}" media="screen" />
        <link rel="stylesheet" href="{{ url('css/animation.css') }}">

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

        <ul id="cuenta1" class="dropdown-content">
          <li><a href="{{ url('entrar') }}">Entrar</a></li>
          <li><a href="{{ url('registro') }}">Registrarse</a></li>
        </ul>
        <ul id="cuenta2" class="dropdown-content">
          <li><a href="{{ url('entrar') }}">Entrar</a></li>
          <li><a href="{{ url('registro') }}">Registrarse</a></li>
        </ul>
        <div class="navbar-fixed">
          <nav id="headernav" class="headergrande">
            <div class="nav-wrapper">
              <a href="{{ url('/') }}" class="brand-logo"><img src="{{ url('img/TERRAZAS.png') }}" alt="" class="img-responsive"></a>
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars"></i></a>
              <ul class="right hide-on-med-and-down nav-links">
                <li><a href="#">Proveedores</a></li>
                <li><a class="dropdown-button" href="#" data-activates="cuenta1">Mi perfil</a></li>
              </ul>
              <ul class="side-nav" id="mobile-demo">
                <li><a href="#">Proveedores</a></li>
                <li><a class="dropdown-button" href="#" data-activates="cuenta2">Mi perfil</a></li>
              </ul>
            </div>
          </nav>
        </div>
        <div class="nbsp">
        </div>

        

        <header class="valign-wrapper headerindex" style="display: none">
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
            </div>
          </div>
        </header>
        <div class="filter headerindex" style="display: none">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="pestana">
                    <p onclick="bajar('#reservaciones');">
                      <a href="#reservaciones" class="pulse">
                        <i class="fa fa-calendar"></i> Explora
                      </a>
                    </p>
                  </div>
                  <h5 class="text-center" id="reservaciones">RESERVACIONES</h5>
                    <form class="form-inline">
                      <div class="form-group">
                        <label for="donde">¿Dónde?</label>
                        <input type="email" class="form-control browser-default" id="donde" placeholder="Lugar">
                      </div>
                      <div class="form-group">
                        <label for="cuando">¿Cuándo?</label>
                        <input type="text" class="form-control browser-default datepicker" id="cuando" placeholder="Fecha">
                      </div>
                      <div class="form-group">
                        <label for="cuanto">¿Cuant@s?</label>
                        <input type="number" class="form-control browser-default" id="cuanto" placeholder="No. de personas">
                      </div>
                      <div class="form-group">
                        <label for="que">¿Qué?</label>
                        <select name="" id="que" class="form-control browser-default">
                          <option value="">Selecciona</option>
                          <option value="Salón">Salón</option>
                          <option value="Terraza">Terraza</option>
                          <option value="Jardín">Jardín</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">&nbsp;</label>
                        <button type="submit" class="btn btn-default" style="color: #fff">Buscar</button>
                      </div>
                      
                    </form>
                </div>
              </div>
            </div>
          </div>


        @yield('pagecontent')
       

      

      <footer>
          <div class="footer-copyright">
            <div class="container">
            © 2018 Todos los derechos reservados
            </div>
          </div>
        </footer>


      <script type="text/javascript" src="{{ url('js/vendor/bootstrap.min.js') }}"></script>
      <script type="text/javascript" src="{{ url('js/vendor/materialize.js') }}"></script>

      <script type="text/javascript" src="{{ url('js/main.js') }}"></script>
      <script src="{{ url('js/wow.js') }}"></script>
      <script>
        new WOW().init();
      </script>
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
          function bajar(valor1){
              $('html, body').animate({
                  scrollTop: $(valor1).offset().top
              }, 3000);
            }


        $(window).scroll(function(){
          if ($(this).scrollTop() > 64){
            $('#headernav').addClass("headermini").fadeIn();
            $('#headernav').removeClass("headergrande");
          }
          else {
            $('#headernav').removeClass("headermini").fadeIn();
            $('#headernav').addClass("headergrande");

          }
        });

        </script>

    </body>
</html>
