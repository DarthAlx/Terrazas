@extends('templates.default')


@section('header')
<style>
  .headermain{
    display: none;
  }
</style>
@endsection
@section('pagecontent')

	<div class="filter">
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
					    <input type="email" class="form-control browser-default" id="cuanto" placeholder="No. de personas">
					  </div>
					  <div class="form-group">
					    <label for="que">¿Qué?</label>
					    <input type="email" class="form-control browser-default" id="que" placeholder="Terraza">
					  </div>
					  <div class="form-group">
					    <label for="">&nbsp;</label>
					  	<button type="submit" class="btn btn-default">Buscar</button>
					  </div>
					  
					</form>
				</div>
			</div>
		</div>
	</div>


@endsection