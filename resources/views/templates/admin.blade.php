<!DOCTYPE html>
<html>
    <head>
        <title>Tu Lugar Ideal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/materialize.css') }}" media="screen" />
        <script defer src="https://use.fontawesome.com/3346f99067.js"></script>
        @yield('header')
        <link rel="stylesheet" type="text/css" href="{{ url('css/admin.css') }}?v={{rand()}}" media="screen" />

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav>
            <ul id="slide-out" class="side-nav fixed">
                
                    <a href="{{url('/admin')}}"><img src="{{ url('img/TERRAZAS.png') }}" class="responsive-img" alt="" style="max-width: 150px;"></a>
                
                  <li>
                    <ul class="collapsible collapsible-accordion">
                        
                      
                    </ul>
                  </li>
                  @if(Auth::user()->role=="admin")
                    <li><a href="{{url('/admin')}}" class="waves-effect"><i class="fa fa-bar-chart" aria-hidden="true"></i> Escritorio</a></li>
                    <li><a href="{{url('/zonas')}}" class="waves-effect"><i class="fa fa-map-marker" aria-hidden="true"></i> Zonas</a></li>
                    <li><a href="{{url('/venues')}}" class="waves-effect"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Lugares</a></li>
                    <li><a href="{{url('/peticiones')}}" class="waves-effect"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Peticiones</a></li>
                    <li><a href="{{url('/servicios')}}" class="waves-effect"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Servicios</a></li>
                    <li><a href="{{url('/crm')}}" class="waves-effect"><i class="fa fa-user" aria-hidden="true"></i> CRM</a></li>
                  @endif

                  @if(Auth::user()->role=="proveedor")
                    <li><a href="{{url('/venues')}}" class="waves-effect"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Lugares</a></li>
                    <li><a href="{{url('/fechas')}}" class="waves-effect"><i class="fa fa-clock-o" aria-hidden="true"></i> Fechas</a></li>
                    <li><a href="{{url('/servicios-extra')}}" class="waves-effect"><i class="fa fa-plus-square" aria-hidden="true"></i> Servicios extra</a></li>

                  @endif
                  
                  
                
                
            </ul>
        </nav>

        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" data-activates="slide-out" class="button-collapse visible-xs"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        <div class="text-right">
                          <button class='dropdown-button btn' href='#' data-activates='dropdown1'>
                            Admin
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            
                          </div>
                        </div>

                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a class="dropdown-item" href="{{url('/salir')}}">Salir</a></li>
                            
                          </ul>
                    </div>
                </div>
            </div>
          
        </header>
        
    
    
        @yield('pagecontent')
        <script type="text/javascript" src="{{ url('js/vendor/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/vendor/materialize.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/ckeditor.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/es.js') }}"></script>

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
        
        @yield('scripts')

    </body>
</html>