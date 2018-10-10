@extends('templates.admin')
@section('header')
<link rel="stylesheet" href="{{ url('js/data-tables/DT_bootstrap.css') }}" />
@endsection
@section('pagecontent')

<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h3 class="">Peticiones</h3>
			</div>
			<div class="col-md-6 text-right valign-wrapper" style="justify-content: space-between;">
				<div class="text-center" style="margin-left: auto; margin-top: 20px;">
					<a href="{{url('/peticions/nuevo')}}" class="btn btn-primary right waves-effect waves-light btn-large">Añadir nuevo</a>
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				@include('snip.notificaciones')
			</div>
		</div>
		<p>&nbsp;</p>


		<div class="row">
			<div class="col-md-12">
				<div class="adv-table table-responsive">
			  <table class="display table table-bordered table-striped table-hover" id="dynamic-table">
			  <thead>
			  	<tr>
					<th>Nombre</th>
					<th>Email</th>
					<th>Teléfono</th>
					<th>Lugar</th>
			      	<th>Zona</th>
			      	<th>Capacidad</th>
					<th>Tipo</th>
					<th></th>
			  	</tr>
			  </thead>
			  <tbody>
			  	@if($peticiones)
			  		@foreach($peticiones as $peticion)

						<tr>
							<td>{{$peticion->user->name}}</td>
							<td>{{$peticion->user->email}}</td>
							<td>{{$peticion->user->tel}}</td>
							<td>{{$peticion->nombre}}</td>
							<td>{{$peticion->zona->nombre}}</td>
							
							<td>{{$peticion->capacidad}}</td>
							<td>{{$peticion->tipo}}</td>
							<td>
								<a class="waves-effect waves-light btn modal-trigger" href="#view{{$peticion->id}}"><i class="fa fa-search-plus"></i></a>
								<a class="waves-effect waves-light btn green modal-trigger" href="#accept{{$peticion->id}}"><i class="fa fa-check"></i></a>
								<a class="waves-effect waves-light btn red modal-trigger" href="#delete{{$peticion->id}}"><i class="fa fa-times-circle"></i></a>
							</td>	

						</tr>
					@endforeach
				@else
					<tr style="cursor: pointer;">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>						
					</tr>

				@endif
				



			  </tbody>
			  <tfoot>
			  	<tr>
			      	<th>Nombre</th>
					<th>Email</th>
					<th>Teléfono</th>
					<th>Lugar</th>
			      	<th>Zona</th>
			      	<th>Capacidad</th>
					<th>Tipo</th>
					<th></th>
			  	</tr>
			  </tfoot>
			  </table>

			  </div>
			</div>
				
		</div>
		
		
		
	</div>
</div>



  @if($peticiones)
	@foreach($peticiones as $peticion)
	<!-- Modal Structure -->
	  <div id="delete{{$peticion->id}}" class="modal">
	    <div class="modal-content">
	      <h4>Eliminar lugar ({{$peticion->nombre}})</h4>
	      <p>¿Está seguro que desea eliminar este lugar?</p>

	      <a href="#!" class="modal-action modal-close waves-effect waves-green btn" style="float: right;">Cancelar</a> 
			<form action="{{ url('/eliminar-peticion') }}" method="post" enctype="multipart/form-data">
				{{ method_field('DELETE') }}
				{!! csrf_field() !!}
				<input type="hidden" name="eliminar" value="{{$peticion->id}}" style="float: right;">
				<input type="submit" class="modal-action modal-close waves-effect waves-green red btn" value="Eliminar" style="float: right;">
			</form>
			<p>	&nbsp;</p>
	    </div>


	  </div>


	  <div id="accept{{$peticion->id}}" class="modal">
	    <div class="modal-content">
	      <h4>Aceptar lugar ({{$peticion->nombre}})</h4>
	      <p>¿Está seguro que desea dar de alta este lugar?</p>

	      <a href="#!" class="modal-action modal-close waves-effect waves-green btn" style="float: right;">Cancelar</a> 
			<form action="{{ url('/aceptar-peticion') }}" method="POST">

				{!! csrf_field() !!}
				<input type="hidden" name="aceptar" value="{{$peticion->id}}" style="float: right;">
				<input type="submit" class="modal-action modal-close waves-effect waves-green green btn" value="Aceptar" style="float: right;">
			</form>
			<p>	&nbsp;</p>
	    </div>


	  </div>



	  <div id="view{{$peticion->id}}" class="modal">
	    <div class="modal-content">
	      <h4>{{$peticion->nombre}}</h4>
	      <p>Detalles de la peticion</p>

	      <div class="table-responsive">
	      	<table class="table">
	      		<thead>
				    <tr>
				      <th>Detalle</th>
				      <th>Descripción</th>
				    </tr>
				  </thead>
				<tbody>
					<tr>
				      <th>Nombre del usuario</th>
				      <td>{{$peticion->user->name}}</td>
				    </tr>
				    <tr>
				      <th>Email</th>
				      <td>{{$peticion->user->email}}</td>
				    </tr>
				    <tr>
				      <th>Teléfono</th>
				      <td>{{$peticion->user->tel}}</td>
				    </tr>
				    <tr>
				      <th>Nombre del lugar</th>
				      <td>{{$peticion->nombre}}</td>
				    </tr>
						<tr>
				      <th>Teléfono del lugar</th>
				      <td>{{$peticion->telefono_lugar}}</td>
				    </tr>
				    <tr>
				      <th>Descripción</th>
				      <td>{{$peticion->descripcion}}</td>
				    </tr>
				    <tr>
				      <th>Latitud</th>
				      <td>{{$peticion->latitud}}</td>
				    </tr>
				    <tr>
				      <th>Longitud</th>
				      <td>{{$peticion->longitud}}</td>
				    </tr>
				    <tr>
				      <th>Zona</th>
				      <td>{{$peticion->zona->nombre}}</td>
				    </tr>
				    <tr>
				      <th>Capacidad</th>
				      <td>{{$peticion->capacidad}}</td>
				    </tr>
						<tr>
				      <th>Tamaño (m<sup>3</sup>)</th>
				      <td>{{$peticion->capacidad}}</td>
				    </tr>
						
				    <tr>
				      <th>Reglamento</th>
				      <td>{{$peticion->reglamento}}</td>
				    </tr>
				    <tr>
				      <th>Tipo</th>
				      <td>{{$peticion->tipo}}</td>
				    </tr>
				    <tr>
				      <th>Servicios</th>
				      <?php $servicios=explode(",", $peticion->servicios); ?>
				      <td>
				      	@foreach($servicios as $servicio)
				      	<?php $serv=App\Servicio::find($servicio); ?>
				      
				      	{!!$serv->icono!!}{{$serv->nombre}}<br>
				      	@endforeach
				      </td>
				    </tr>
				    <tr>
				      <th>Imágen</th>
				      <td><img src="{{url('uploads/venues')}}/{{$peticion->imagen}}" class="materialboxed" style="max-width: 150px;" alt=""></td>
				    </tr>
						@if($peticion->galeria)
						<tr>
				      <th>Galería</th>
				      <td>
							@foreach($peticion->galeria as $poplet)
								<img src="{{url('uploads/venues/poplets/')}}/{{$peticion->id}}/{{$poplet->imagen}}" class="materialboxed" style="max-width: 150px;" alt="">
							@endforeach
							</td>
						</tr>
						<style>
							.material-placeholder{
								float: left;
							}
							.materialboxed.active{
									max-width: 100% !important;
							}
						</style>
						@endif
				</tbody>
	      	</table>
	      </div>	

	      <a href="#!" class="modal-action modal-close waves-effect waves-green btn" style="float: right;">Cancelar</a> 
			<form action="{{ url('/eliminar-peticion') }}" method="post" enctype="multipart/form-data">
				{{ method_field('DELETE') }}
				{!! csrf_field() !!}
				<input type="hidden" name="eliminar" value="{{$peticion->id}}" style="float: right;">
				<input type="submit" class="modal-action modal-close waves-effect waves-green red btn" value="Eliminar" style="float: right;">
			</form>
			<p>	&nbsp;</p>
	    </div>


	  </div>

	  @endforeach
	@endif



@endsection

@section('scripts')
<script type="text/javascript" language="javascript" src="{{ url('js/advanced-datatable/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ url('js/data-tables/DT_bootstrap.js') }}"></script>
<!--dynamic table initialization -->
<script src="{{ url('js/dynamic_table_init.js') }}"></script>
<script>
	$(document).ready(function() {
		$('.table tr th:first-child').removeClass('sorting_desc');
		$('.table tr th:first-child').addClass('sorting');
		$('.table tr th:nth-child(3)').addClass('sorting_asc');
	});
	
</script>
@endsection