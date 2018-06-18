@extends('templates.admin')
@section('header')
<link rel="stylesheet" href="{{ url('js/data-tables/DT_bootstrap.css') }}" />
@endsection
@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h3 class="">Lugares</h3>
			</div>
			<div class="col-md-6 text-right valign-wrapper" style="justify-content: space-between;">
				<div class="text-center" style="margin-left: auto; margin-top: 20px;">
					<a href="{{url('/venues/nuevo')}}" class="btn btn-primary right waves-effect waves-light btn-large">Añadir nuevo</a>
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
			      	<th>Zona</th>
			      	<th>Precio</th>
			      	<th>Capacidad</th>
					<th>Tipo</th>
					<th></th>
			  	</tr>
			  </thead>
			  <tbody>
			  	@if($venues)
			  		@foreach($venues as $venue)

						<tr>
							<td>{{$venue->nombre}}</td>
							<td>{{$venue->zona}}</td>
							<td>{{$venue->precio}}</td>
							<td>{{$venue->capacidad}}</td>
							<td>{{$venue->tipo}}</td>
							<td>
								<a class="waves-effect waves-light btn modal-trigger" href="#update{{$venue->id}}"><i class="fa fa-search-plus"></i></a>
								<a class="waves-effect waves-light btn red modal-trigger" href="#delete{{$venue->id}}"><i class="fa fa-times-circle"></i></a>
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
			      	<th>Zona</th>
			      	<th>Precio</th>
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





  <div id="nuevo" class="modal">
  	<form action="{{ url('/agregar-servicio') }}" method="post" enctype="multipart/form-data">
	    <div class="modal-content">
	      <h4>Añadir nuevo</h4>
				{!! csrf_field() !!}
				<div class="input-field col m8">
		          <input id="nombre" name="nombre" type="text" class="validate" value="{{old('nombre')}}" required>
		          <label for="nombre">Nombre del servicio</label>
		        </div>
		        <div class="input-field col m8">
		          <input id="icono" name="icono" type="text" class="validate" value="{{old('icono')}}" required>
		          <label for="icono">Icono</label>
		        </div>
		        <div class="col m4">
		        	<input type="submit" value="Guardar" class="btn btn-primary right waves-effect waves-light">
		        </div>
		        <p>&nbsp;</p><p>&nbsp;</p>
	    </div>
    </form>
  </div>

  @if($servicios)
	@foreach($servicios as $servicio)
	<!-- Modal Structure -->
	  <div id="delete{{$servicio->id}}" class="modal">
	    <div class="modal-content">
	      <h4>Eliminar catalogo ({{$servicio->nombre}})</h4>
	      <p>¿Está seguro que desea eliminar este catalogo?</p>

	      <a href="#!" class="modal-action modal-close waves-effect waves-green btn" style="float: right;">Cancelar</a> 
			<form action="{{ url('/eliminar-servicio') }}" method="post" enctype="multipart/form-data">
				{{ method_field('DELETE') }}
				{!! csrf_field() !!}
				<input type="hidden" name="eliminar" value="{{$servicio->id}}" style="float: right;">
				<input type="submit" class="modal-action modal-close waves-effect waves-green red btn" value="Eliminar" style="float: right;">
			</form>
			<p>	&nbsp;</p>
	    </div>


	  </div>



	  <!-- Modal Structure -->
	  <div id="update{{$servicio->id}}" class="modal">
	  	<form action="{{ url('/actualizar-servicio') }}" method="post" enctype="multipart/form-data">
	    <div class="modal-content">
	      <h4>Editar ({{$servicio->nombre}})</h4>
				{!! csrf_field() !!}
				<div class="input-field col m8">
					<input type="hidden" value="{{$servicio->id}}" name="id">
		          <input id="nombre" name="nombre" type="text" class="validate" value="{{ $servicio->nombre or old('nombre')}}" required>
		          <label for="nombre">Nombre del servicio</label>
		        </div>
		        <div class="input-field col m8">
		          <input id="icono" name="icono" type="text" class="validate" value="{{ $servicio->icono or old('icono')}}" required>
		          <label for="icono">Icono</label>
		        </div>
		        <div class="col m4">
		        	<input type="submit" value="Guardar" class="btn btn-primary right waves-effect waves-light">
		        </div>
		        <p>&nbsp;</p><p>&nbsp;</p>
	    </div>

	    </form>
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