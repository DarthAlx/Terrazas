@extends('templates.admin')
@section('header')
<link rel="stylesheet" href="{{ url('js/data-tables/DT_bootstrap.css') }}" />
@endsection
@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h3 class="">Servicios extra</h3>
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
					<th>Nombre</th>
			      	<th>Precio</th>
					<th></th>
			  	</tr>
			  </thead>
			  <tbody>
			  	@if($serviciosextra)
			  		@foreach($serviciosextra as $servicioextra)

						<tr>
							<td>{{$servicioextra->nombre}}</td>
							<td>{{$servicioextra->precio}}</td>

							<td>
								<a class="waves-effect waves-light btn modal-trigger" href="#update{{$servicioextra->id}}"><i class="fa fa-search-plus"></i></a>
								<a class="waves-effect waves-light btn red modal-trigger" href="#delete{{$servicioextra->id}}"><i class="fa fa-times-circle"></i></a>
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
			      	<th>Precio</th>
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
  	<form action="{{ url('/agregar-servicioextra') }}" method="post" enctype="multipart/form-data">
	    <div class="modal-content">
	      <h4>Añadir nuevo</h4>
				{!! csrf_field() !!}
				<div class="input-field col m12">
		          <input id="nombre" name="nombre" type="text" class="validate" value="{{old('nombre')}}" required>
		          <label for="nombre">Nombre</label>
		        </div>
		        <div class="input-field col m6">
		        	<textarea name="descripcion" id="descripcion"  class="materialize-textarea" required>{{old('descripcion')}}</textarea>
		          
		          <label for="hora_inicio">Descripción</label>
		        </div>
		        <div class="input-field col m12">
		          <input id="precio" name="precio" type="text" class="validate" value="{{old('precio')}}" required>
		          <label for="precio">Precio</label>
		        </div>
		        <div class="col m4">
		        	<input type="submit" value="Guardar" class="btn btn-primary right waves-effect waves-light">
		        </div>
		        <p>&nbsp;</p><p>&nbsp;</p>
	    </div>
    </form>
  </div>


  @if($serviciosextra)
	@foreach($serviciosextra as $servicioextra)
	<!-- Modal Structure -->
	  <div id="delete{{$servicioextra->id}}" class="modal">
	    <div class="modal-content">
	      <h4>Eliminar servicio ({{$servicioextra->nombre}})</h4>
	      <p>¿Está seguro que desea eliminar este servicio?</p>

	      <a href="#!" class="modal-action modal-close waves-effect waves-green btn" style="float: right;">Cancelar</a> 
			<form action="{{ url('/eliminar-servicioextra') }}" method="post" enctype="multipart/form-data">
				{{ method_field('DELETE') }}
				{!! csrf_field() !!}
				<input type="hidden" name="eliminar" value="{{$servicioextra->id}}" style="float: right;">
				<input type="submit" class="modal-action modal-close waves-effect waves-green red btn" value="Eliminar" style="float: right;">
			</form>
			<p>	&nbsp;</p>
	    </div>


	  </div>


<!-- Modal Structure -->
	  <div id="update{{$servicioextra->id}}" class="modal">
	  	<form action="{{ url('/actualizar-servicioextra') }}" method="post" enctype="multipart/form-data">
	    <div class="modal-content">
	      <h4>Editar ({{$servicioextra->nombre}})</h4>
				{!! csrf_field() !!}

				<div class="input-field col m12">
		          <input id="nombre" name="nombre" type="text" class="validate" value="{{$servicioextra->nombre or old('nombre')}}" required>
		          <label for="nombre">Nombre</label>
		        </div>
		        <div class="input-field col m6">
		        	<textarea name="descripcion" id="descripcion"  class="materialize-textarea" required>{{$servicioextra->descripcion or old('descripcion')}}</textarea>
		          
		          <label for="hora_inicio">Descripción</label>
		        </div>
		        <div class="input-field col m12">
		          <input id="precio" name="precio" type="number" class="validate" value="{{$servicioextra->precio or old('precio')}}" required>
		          <label for="precio">Precio</label>
		        </div>
		        <input type="hidden" name="id" value="{{$servicioextra->id}}">
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