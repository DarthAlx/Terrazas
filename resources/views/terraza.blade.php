@extends('templates.default')


@section('header')
<style>
  .headerindex{
    display: none;
  }
</style>
@endsection
@section('pagecontent')

	<div class="main">
		<div class="col-md-12" style="background: url({{url('uploads/venues')}}/{{$venue->imagen}}); background-size: cover; background-position: center center; height: 60vh;">
			<div class="terrazatitle">
				<h3><strong>{{$venue->nombre}}</strong></h3>
				@if(!$venue->galeria->isEmpty())
				<a href="#galeria" class="btn btn-primary" style="">Ver fotos</a>
				@endif
			</div>
			
		</div>
		
		<div class="container iconsterraza wow bounceInLeft">
			<div class="row">
				<p>&nbsp;</p>
			  	<a class="navlinks" href="#">
			  		<div class="col s6 m2 l2 offset-m1 offset-l1 company text-center">
					  	<i class="fa fa-map-marker ite" aria-hidden="true"></i>
					  	<p class="text-center navtext">{{$venue->zona}}</p>
				  	</div>
				</a>
			  	<a class="navlinks" href="#">
			  		<div class="col s6 m2 l2 company text-center">
					  	<i class="fa fa-tags ite" aria-hidden="true"></i>
					  	<p class="text-center navtext">{{$venue->tipo}}</p>
				  	</div>
				</a>
				<a class="navlinks" href="#">
			  		<div class="col s6 m2 l2 company text-center">
					  	<i class="fa fa-usd ite" aria-hidden="true"></i> 
					  	<p class="text-center navtext">{{$venue->precio}}</p>
				  	</div>
				</a>
				<a class="navlinks" href="#">
			  		<div class="col s6 m2 l2 company text-center">
					  	<i class="fa fa-clock-o ite" aria-hidden="true"></i>
					  	<p class="text-center navtext">11:00 - 22:00</p>
				  	</div>
				</a>
				<a class="navlinks" href="#">
			  		<div class="col s6 m2 l2 company text-center">
					  	<i class="fa fa-users ite" aria-hidden="true"></i>
					  	<p class="text-center navtext">{{$venue->capacidad}}</p>
				  	</div>
				</a>
				<br>
				
			</div>
			<hr>
		</div>

		

		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<p><strong>Descripción</strong></p>
					<p>
						{{$venue->descripcion}}
					</p>
					<hr>
					<p><strong>Servicios</strong></p>
					<ul class="servicioslist">
						@foreach(explode(',',$venue->servicios) as $servicio)
						<?php $serv=App\Servicio::find($servicio); ?>
						<li>{!!$serv->icono!!} {{$serv->nombre}}</li>
						@endforeach
						
					</ul>
					<br>
					<a role="button" data-toggle="collapse" href="#serviciosextra" aria-expanded="false" aria-controls="collapseExample">
					  Ver servicios extra <span class="caret"></span>
					</a>

					<div class="collapse" id="serviciosextra">
					  <div class="well">
					    <ul>
							@foreach(explode(',',$venue->serviciosextra) as $servicio)
							<?php $serv=App\ServicioExtra::find($servicio); ?>
							<li><p><strong>{{$serv->nombre}} - ${{$serv->precio}}</strong>  <br> {{$serv->descripcion}}</p></li>
							@endforeach
							
						</ul>
					  </div>
					</div>
					<br>
					<hr>
					<p><strong>Ubicación</strong></p>

					<p>
						{{$venue->direccion}}
					</p>
					<div class="map visible-xs visible-sm">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120447.76804191722!2d-99.16662403042737!3d19.36946654081599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce0026db097507%3A0x54061076265ee841!2sCiudad+de+M%C3%A9xico%2C+CDMX!5e0!3m2!1ses-419!2smx!4v1526928677783" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<hr>
					<p><strong>Reglamento</strong></p>
					<p>{{$venue->reglamento}}</p>

					
				</div>
				<div class="col-md-4">
					<p>&nbsp;</p>
					<form action="{{url('reservar-lugar')}}" method="get">
					<div class="reservacion hidden-xs hidden-sm" id="reservacion">
						<div class="precio">
							<h5><strong>$<span class="precioxfecha"></span> MXN</strong> <small>por evento</small></h5>
							<hr>
							<div class="map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120447.76804191722!2d-99.16662403042737!3d19.36946654081599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce0026db097507%3A0x54061076265ee841!2sCiudad+de+M%C3%A9xico%2C+CDMX!5e0!3m2!1ses-419!2smx!4v1526928677783" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
							<input type="hidden" name="venue" value="{{$venue->id}}">
							<input type="date" name="fecha" class="datepicker" placeholder="Fecha">
							<button class="btn btn-primary" style="width: 100%;">Reservar</button>
						</div>
					</div>
					</form>
					<form action="{{url('reservar-lugar')}}" method="get">
					<div class="reservacionmini visible-xs visible-sm" id="reservacionmini">
						<div class="precio row">
							<div class="col-xs-6">
								<h5><strong>$<span class="precioxfecha"></span> MXN</strong> <small>por evento</small></h5>
							</div>
							<div class="col-xs-6">
								<input type="hidden" name="venue" value="{{$venue->id}}">
								<input type="date" name="fecha" class="datepicker" placeholder="Fecha">
							</div>
							
							
							<button class="btn btn-primary" style="width: 100%;">Reservar</button>
						</div>
					</div>
					</form>
					<script>
						var reservacion = document.getElementById("reservacion");

						$(window).scroll(function(){
				                if ($(this).scrollTop() >= 768){
				                  $('#reservacion').addClass("resfixed");

								}
				                else {
				                  $('#reservacion').removeClass("resfixed");
								}
				      });
					</script>
					
				</div>
			</div>
		</div>
		<p class="visible-xs visible-sm">&nbsp;</p>
		<p class="visible-xs visible-sm">&nbsp;</p>
		<p class="visible-xs visible-sm">&nbsp;</p>


		<div id="galeria">
	        <button type="button" class="close">&times;</button>
	        
	        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			  	<?php $galcont=1; ?>
			  	@foreach($venue->galeria as $poplet)
			  	@if($galcont==1)
			    <div class="item active">
			      <img src="{{url('uploads/venues')}}/poplets/{{$venue->id}}/{{$poplet->imagen}}" class="img-responsive galeria">
			    </div>
			    <?php $galcont++; ?>
			    @else
			    <div class="item">
			      <img src="{{url('uploads/venues')}}/poplets/{{$venue->id}}/{{$poplet->imagen}}" class="img-responsive galeria">
			    </div>
			    @endif
			    @endforeach

			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="fa fa-chevron-left" aria-hidden="true" style="color: #fff;"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="fa fa-chevron-right" aria-hidden="true" style="color: #fff;"></span>
			    <span class="sr-only">Next</span>
			  </a>

			  <br>
			  <div class="indicadores">
			  	<div class="container-fluid">
			  		<div class="row">
			  			<?php $galcont=0; ?>
					  	@foreach($venue->galeria as $poplet)
					  	@if($galcont==0)
					  	<div class="col-md-2 col-sm-3 col-xs-4" style="cursor: pointer">
			  				<img src="{{url('uploads/venues')}}/poplets/{{$venue->id}}/{{$poplet->imagen}}" data-target="#carousel-example-generic" data-slide-to="0" class="img-responsive active">
			  			</div>
					    <?php $galcont++; ?>
					    @else
					    <div class="col-md-2 col-sm-3 col-xs-4" style="cursor: pointer">
			  				<img src="{{url('uploads/venues')}}/poplets/{{$venue->id}}/{{$poplet->imagen}}" data-target="#carousel-example-generic" data-slide-to="{{$galcont}}" class="img-responsive">
			  			</div>
			  			<?php $galcont++; ?>
					    @endif
					    @endforeach
			  		</div>
			  	</div>
			  </div>
			  

			</div>
        </div>

        <script>
        	$(function () {
			    $('a[href="#galeria"]').on('click', function(event) {
			        event.preventDefault();
			        $('#galeria').addClass('open');
			        $('#galeria > form > input[type="search"]').focus();
			    });
			    
			    $('#galeria, #galeria button.close').on('click keyup', function(event) {
			        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
			            $(this).removeClass('open');
			        }
			    });
			    

			});
        </script>
		

	</div>

@endsection
@section('scripts')

<script>
	$('.datepicker').on('change',function(){
		calendario();
	});
	$('.picker__day').on('click',function(){
		calendario();
	});

	@foreach($venue->horarios as $horario)
	$("div[aria-label='{{$horario->fecha}}']").click(function(){
		$('.picker__holder').click();
	});
	@endforeach


	$(window).load(function() {
		calendario();
	});


	$(document).ready(function(){
		$('.picker__holder').click(function(){
			calendario();
		});

		$('.picker__input').click(function(){
			calendario();
		});
	});
	

	function calendario(){
		@foreach($venue->horarios as $horario)
				@if($horario->status=="rentado")
					$("div[aria-label='{{$horario->fecha}}']").css("background-color","red");
					$("div[aria-label='{{$horario->fecha}}']").click(false);
				@endif
					
				@if($horario->status=="apartado")
					$("div[aria-label='{{$horario->fecha}}']").css("background-color","orange");
					$("div[aria-label='{{$horario->fecha}}']").click(false);
				@endif

				@if($horario->status=="disponible")
					$("div[aria-label='{{$horario->fecha}}']").css("background-color","green");
					$("div[aria-label='{{$horario->fecha}}']").click(function(){
						$('.precioxfecha').html('{{$horario->precio}}');
						$('.picker__holder').click();
					});
				@endif
			@endforeach
	}


	</script>
@endsection