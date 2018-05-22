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
		<div class="col-md-12" style="background: url({{url('img/terraza1.jpg')}}); background-size: cover; background-position: center center; height: 60vh;">
			<h3 class="terrazatitle"><strong>Terraza 1</strong></h3>
			<a href="#galeria" class="btn btn-primary" style="position: absolute; bottom: 20px;">Ver fotos</a>
		</div>
		
		<div class="container iconsterraza wow bounceInLeft">
			<div class="row">
				<p>&nbsp;</p>
			  	<a class="navlinks" href="#">
			  		<div class="col s6 m2 l2 offset-m2 offset-l2 company text-center">
					  	<i class="fa fa-map-marker ite" aria-hidden="true"></i>
					  	<p class="text-center navtext">Polanco</p>
				  	</div>
				</a>
			  	<a class="navlinks" href="#">
			  		<div class="col s6 m2 l2 company text-center">
					  	<i class="fa fa-tags ite" aria-hidden="true"></i>
					  	<p class="text-center navtext">Terraza</p>
				  	</div>
				</a>
				<a class="navlinks" href="#">
			  		<div class="col s6 m2 l2 company text-center">
					  	<i class="fa fa-usd ite" aria-hidden="true"></i> 
					  	<p class="text-center navtext">7,988</p>
				  	</div>
				</a>
				<a class="navlinks" href="#">
			  		<div class="col s6 m2 l2 company text-center">
					  	<i class="fa fa-users ite" aria-hidden="true"></i>
					  	<p class="text-center navtext">50 - 100</p>
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
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. A perferendis ipsum incidunt enim non quos dolores itaque animi doloremque dolore, facilis, impedit eius blanditiis unde praesentium fugit debitis sequi fuga. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas laborum commodi doloremque tempore quo laudantium quasi impedit, maxime alias aut nulla quisquam repellat distinctio quidem minus quod aliquid, vero voluptatum.
					</p>
					<hr>
					<p><strong>Servicios</strong></p>
					<ul class="servicioslist">
						<li><i class="fa fa-wifi" aria-hidden="true"></i> WiFi</li>
						<li><i class="fa fa-television" aria-hidden="true"></i> TV</li>
						<li><i class="fa fa-male" aria-hidden="true"></i><i class="fa fa-female" aria-hidden="true"></i> 2 baños</li>
					</ul>
					<br>
					<a role="button" data-toggle="collapse" href="#serviciosextra" aria-expanded="false" aria-controls="collapseExample">
					  Ver servicios extra <span class="caret"></span>
					</a>

					<div class="collapse" id="serviciosextra">
					  <div class="well">
					    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse aliquid dolorem quibusdam, voluptas, deleniti accusamus quis praesentium, accusantium fugit asperiores earum. Fugiat cum recusandae, explicabo nobis quis odit blanditiis repellat.
					  </div>
					</div>
					<br>
					<hr>
					<p><strong>Ubicación</strong></p>

					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ab temporibus, saepe mollitia tempora ratione debitis.
					</p>
					<div class="map visible-xs visible-sm">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120447.76804191722!2d-99.16662403042737!3d19.36946654081599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce0026db097507%3A0x54061076265ee841!2sCiudad+de+M%C3%A9xico%2C+CDMX!5e0!3m2!1ses-419!2smx!4v1526928677783" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<hr>
					<p><strong>Reglamento</strong></p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam quis excepturi quisquam temporibus assumenda, repellendus. Qui expedita quod, error accusantium ratione quis quos dolor iste rem dicta pariatur sapiente, quibusdam!</p>

					
				</div>
				<div class="col-md-4">
					<p>&nbsp;</p>
					<div class="reservacion hidden-xs hidden-sm" id="reservacion">
						<div class="precio">
							<h5><strong>$399 MXN</strong> <small>por evento</small></h5>
							<hr>
							<div class="map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120447.76804191722!2d-99.16662403042737!3d19.36946654081599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce0026db097507%3A0x54061076265ee841!2sCiudad+de+M%C3%A9xico%2C+CDMX!5e0!3m2!1ses-419!2smx!4v1526928677783" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
							<input type="date" class="datepicker" placeholder="Fecha">
							<button class="btn btn-primary" style="width: 100%;">Reservar</button>
						</div>
					</div>

					<div class="reservacionmini visible-xs visible-sm" id="reservacionmini">
						<div class="precio row">
							<div class="col-xs-6">
								<h5><strong>$399 MXN</strong> <small>por evento</small></h5>
							</div>
							<div class="col-xs-6">
								<input type="date" class="datepicker" placeholder="Fecha">
							</div>
							
							<button class="btn btn-primary" style="width: 100%;">Reservar</button>
						</div>
					</div>
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
			    <div class="item active">
			      <img src="{{url('/img/terraza1.jpg')}}" class="img-responsive">
			    </div>
			    <div class="item">
			      <img src="{{url('/img/terraza1.jpg')}}" class="img-responsive">
			    </div>
			    <div class="item">
			      <img src="{{url('/img/terraza1.jpg')}}" class="img-responsive">
			    </div>
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
			  			<div class="col-md-2 col-sm-3 col-xs-4" style="cursor: pointer">
			  				<img src="{{url('/img/terraza1.jpg')}}" data-target="#carousel-example-generic" data-slide-to="0" class="img-responsive active">
			  			</div>
			  			<div class="col-md-2 col-sm-3 col-xs-4" style="cursor: pointer">
			  				<img src="{{url('/img/terraza1.jpg')}}" data-target="#carousel-example-generic" data-slide-to="1" class="img-responsive">
			  			</div>
			  			<div class="col-md-2 col-sm-3 col-xs-4" style="cursor: pointer">
			  				<img src="{{url('/img/terraza1.jpg')}}" data-target="#carousel-example-generic" data-slide-to="2" class="img-responsive">
			  			</div>
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