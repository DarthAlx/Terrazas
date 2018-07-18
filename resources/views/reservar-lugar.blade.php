@extends('templates.default')


@section('header')

@endsection
@section('pagecontent')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">RESERVACIÓN</h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Lugar</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Zona</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$horario->venue->nombre}}</td>
                            <td>{{$horario->fecha}}</td>
                            <td>{{$horario->zona}}</td>
                            <td>{{$horario->fecha}}</td>
                            <td>${{$horario->precio}} MXN</td>
                        </tr>
                        
                        @if($horario->venue->serviciosextra!="")
                        <tr>
                            <td colspan="5"><h6 class="text-center"><strong>SERVICIOS EXTRA</strong></h6> </td>
                        </tr>

                        
                        @foreach(explode(",",$horario->venue->serviciosextra) as $extra)
                        @php
                        $servicioextra=App\ServicioExtra::find($extra);
                        @endphp
                        <tr>
                            <td>
                                <p style="margin: 0;">
                                    <input type="checkbox" id="serv{{$servicioextra->id}}" class="checkbox" name="serviciosextra[]" value="{{$servicioextra->id}}" />
                                    <label for="serv{{$servicioextra->id}}">Agregar</label>
                                </p>
                            </td>
                            <td>{{$servicioextra->nombre}}</td>
                            <td colspan="2">{{$servicioextra->descripcion}}</td>
                            <td>$<span id="precio{{$servicioextra->id}}">{{$servicioextra->precio}}</span>  MXN</td>
                            
                        </tr>
                        @endforeach

                        @endif

                        <tr>
                            <td></td>
                            <td></td>
                            <td><h5><strong>Total</strong></h5></td>
                            <td colspan="2" class="text-right"> <h5><strong> $<span id="total">{{$horario->precio}}</span> MXN</strong></h5> </td>
                        </tr>
                    </tbody>
                </table>
                <script>
                    $(".checkbox").change(function() {
                        if(this.checked) {
                            precio=$('#precio'+this.value).html();
                            total=$('#total').html();
                            nuevototal=parseInt(precio)+parseInt(total);
                            $('#total').html(nuevototal);
                        }
                        else{
                            precio=$('#precio'+this.value).html();
                            total=$('#total').html();
                            nuevototal=parseInt(total)-parseInt(precio);
                            $('#total').html(nuevototal);
                        }
                    });
                </script>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="col-xs-12  col-sm-6">
                    <button class="btn btn-block btn-light">Ver más lugares</button>
                </div>
                <div class="col-xs-12 col-sm-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Reservar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection