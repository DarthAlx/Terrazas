@extends('templates.admin')
@section('header')
<link rel="stylesheet" href="{{ url('js/data-tables/DT_bootstrap.css') }}" />
@endsection
@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h3 class="">Fechas</h3>
			</div>
			<div class="col-md-6 text-right valign-wrapper" style="justify-content: space-between;">
				<div class="text-center" style="margin-left: auto; margin-top: 20px;">
					<a href="#nuevo" class="btn btn-primary right waves-effect waves-light btn-large modal-trigger">Añadir nuevo</a>
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
					<th>Lugar</th>
			      	<th>Fecha</th>
			      	<th>Horario</th>
			      	<th>Precio</th>
					<th>Estatus</th>
					<th></th>
			  	</tr>
			  </thead>
			  <tbody>
			  	@if($fechas)
			  		@foreach($fechas as $fecha)

						<tr>
							<td>{{$fecha->venue->nombre}}</td>
							<td>{{$fecha->fecha}}</td>
							<td>{{$fecha->hora_inicio}} - {{$fecha->hora_fin}}</td>
							<td>{{$fecha->precio}}</td>
							<td>{{$fecha->status}}</td>
							<td>
								<a class="waves-effect waves-light btn modal-trigger" href="#update{{$fecha->id}}"><i class="fa fa-plus"></i></a>
								<a class="waves-effect waves-light btn red modal-trigger" href="#delete{{$fecha->id}}"><i class="fa fa-times-circle"></i></a>
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
			      	<th>Lugar</th>
			      	<th>Fecha</th>
			      	<th>Horario</th>
			      	<th>Precio</th>
					<th>Estatus</th>
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
  	<form action="{{ url('/agregar-fecha') }}" method="post" enctype="multipart/form-data">
	    <div class="modal-content">
	      <h4>Añadir nuevo</h4>
				{!! csrf_field() !!}

				<div class="input-field col m12">
		          <select name="venue_id" id="venue" class="select">
		          	<option value="">Selecciona...</option>
		          	@foreach($venues as $venue)
						<option value="{{$venue->id}}">{{$venue->nombre}}</option>
		          	@endforeach
		          </select>
		          <label for="fecha">Fecha</label>
		        </div>
				<div class="input-field col m12">
		          <input id="fecha" name="fecha" type="text" class="validate datepicker" value="{{old('fecha')}}" required>
		          <label for="fecha">Fecha</label>
		        </div>
		        <div class="input-field col m6">
		          <input id="hora_inicio" name="hora_inicio" type="text" class="validate timepicker" value="{{old('hora_inicio')}}" required>
		          <label for="hora_inicio">Inicio</label>
		        </div>
		        <div class="input-field col m6">
		          <input id="hora_fin" name="hora_fin" type="text" class="validate timepicker" value="{{old('hora_fin')}}" required>
		          <label for="hora_fin">Fin</label>
		        </div>
		        <div class="input-field col m12">
		          <input id="precio" name="precio" type="number" class="validate" value="{{old('precio')}}" required>
		          <label for="precio">Precio</label>
		        </div>
		        <div class="col m4">
		        	<input type="submit" value="Guardar" class="btn btn-primary right waves-effect waves-light">
		        </div>
		        <p>&nbsp;</p><p>&nbsp;</p>
	    </div>
    </form>
  </div>


  @if($fechas)
	@foreach($fechas as $fecha)
	<!-- Modal Structure -->
	  <div id="delete{{$fecha->id}}" class="modal">
	    <div class="modal-content">
	      <h4>Eliminar lugar ({{$fecha->nombre}})</h4>
	      <p>¿Está seguro que desea eliminar este lugar?</p>

	      <a href="#!" class="modal-action modal-close waves-effect waves-green btn" style="float: right;">Cancelar</a> 
			<form action="{{ url('/eliminar-fecha') }}" method="post" enctype="multipart/form-data">
				{{ method_field('DELETE') }}
				{!! csrf_field() !!}
				<input type="hidden" name="eliminar" value="{{$fecha->id}}" style="float: right;">
				<input type="submit" class="modal-action modal-close waves-effect waves-green red btn" value="Eliminar" style="float: right;">
			</form>
			<p>	&nbsp;</p>
	    </div>


	  </div>


<!-- Modal Structure -->
	  <div id="update{{$fecha->id}}" class="modal">
	  	<form action="{{ url('/actualizar-fecha') }}" method="post" enctype="multipart/form-data">
	    <div class="modal-content">
	      <h4>Editar ({{$fecha->nombre}})</h4>
				{!! csrf_field() !!}
				<div class="input-field col m8">
					<input type="hidden" value="{{$fecha->id}}" name="id">
		          <input id="nombre" name="nombre" type="text" class="validate" value="{{ $fecha->nombre or old('nombre')}}" required>
		          <label for="nombre">Nombre del fecha</label>
		        </div>
		        <div class="input-field col m8">
		          <input id="icono" name="icono" type="text" class="validate" value="{{ $fecha->icono or old('icono')}}" required>
		          <label for="icono">Icono</label>
		        </div>
		        <div class="col m4">
		        	<input type="submit" value="Guardar" class="btn btn-primary right waves-effect waves-light">
		        </div>
		        <p>&nbsp;</p><p>&nbsp;</p>
	    </div>


	    <div class="modal-content">
	      <h4>Editar ({{$fecha->venue->nombre}} - {{$fecha->fecha}})</h4>
				{!! csrf_field() !!}

				<div class="input-field col m12">
		          <select name="venue_id" id="venue" class="select">
		          	<option value="">Selecciona...</option>
		          	@foreach($venues as $venue)
						<option value="{{$venue->id}}">{{$venue->nombre}}</option>
		          	@endforeach
		          </select>
		          <label for="fecha">Fecha</label>
		        </div>
				<div class="input-field col m12">
		          <input id="fecha" name="fecha" type="text" class="validate datepicker" value="{{old('fecha')}}" required>
		          <label for="fecha">Fecha</label>
		        </div>
		        <div class="input-field col m6">
		          <input id="hora_inicio" name="hora_inicio" type="text" class="validate timepicker" value="{{old('hora_inicio')}}" required>
		          <label for="hora_inicio">Inicio</label>
		        </div>
		        <div class="input-field col m6">
		          <input id="hora_fin" name="hora_fin" type="text" class="validate timepicker" value="{{old('hora_fin')}}" required>
		          <label for="hora_fin">Fin</label>
		        </div>
		        <div class="input-field col m12">
		          <input id="precio" name="precio" type="number" class="validate" value="{{old('precio')}}" required>
		          <label for="precio">Precio</label>
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