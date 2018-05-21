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
		<div class="col-md-12" style="background: url({{url('img/terraza1.jpg')}}); background-size: cover; background-position: center center; height: 60vh;"></div>
		

		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<p>&nbsp;</p>
					<h4><strong>Terraza 1</strong></h4>
					<p>
						Aquí la dirección completa de la terraza <br>


					</p>
					<p>
						<i class="fa fa-users" aria-hidden="true"></i> 30 personas &nbsp; <i class="fa fa-male" aria-hidden="true"></i><i class="fa fa-female" aria-hidden="true"></i> 2 baños
					</p>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. A perferendis ipsum incidunt enim non quos dolores itaque animi doloremque dolore, facilis, impedit eius blanditiis unde praesentium fugit debitis sequi fuga. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas laborum commodi doloremque tempore quo laudantium quasi impedit, maxime alias aut nulla quisquam repellat distinctio quidem minus quod aliquid, vero voluptatum.
					</p>
					<hr>
					<p><strong>Servicios</strong></p>
					<ul class="servicioslist">
						<li><i class="fa fa-wifi" aria-hidden="true"></i> WiFi</li>
						<li><i class="fa fa-television" aria-hidden="true"></i> TV</li>
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
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120447.76804191722!2d-99.16662403042737!3d19.36946654081599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce0026db097507%3A0x54061076265ee841!2sCiudad+de+M%C3%A9xico%2C+CDMX!5e0!3m2!1ses-419!2smx!4v1526928677783" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<hr>
					<p><strong>Reglamento</strong></p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam quis excepturi quisquam temporibus assumenda, repellendus. Qui expedita quod, error accusantium ratione quis quos dolor iste rem dicta pariatur sapiente, quibusdam!</p>

					
				</div>
				<div class="col-md-4">
					<p>&nbsp;</p>
					<div class="reservacion" id="reservacion">
						<div class="precio">
							<h5><strong>$399 MXN</strong> <small>por evento</small></h5>
							<hr>
							<input type="date" class="datepicker" placeholder="Fecha">
							<button class="btn" style="background: #ffdd00; width: 100%; color: #000; font-family: Lato; font-weight: 600">Reservar</button>
						</div>
					</div>
					<script>
						var reservacion = document.getElementById("reservacion");

						$(window).scroll(function()
				            {
				                if ($(this).scrollTop() >= reservacion.offsetTop){
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
		

	</div>

@endsection