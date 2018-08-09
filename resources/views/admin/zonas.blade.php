@extends('templates.admin')
@section('header')
<link rel="stylesheet" href="{{ url('js/data-tables/DT_bootstrap.css') }}" />
@endsection
@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h3 class="">Zonas</h3>
			</div>
			<div class="col-md-6 text-right valign-wrapper" style="justify-content: space-between;">
				<div class="text-center" style="margin-left: auto; margin-top: 20px;">
					<a href="#nueva" class="btn right waves-effect waves-light btn-large modal-trigger">Añadir nueva</a>
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
			      				      	
			      	<th></th>
			  	</tr>
			  </thead>
			  <tbody>
			  	@if($zonas)
			  		@foreach($zonas as $zona)
						<tr>
							<td>{{$zona->nombre}}</td>
												
							<td>
								<a class="waves-effect waves-light btn modal-trigger" href="#update{{$zona->id}}"><i class="fa fa-pencil"></i></a>
								<a class="waves-effect waves-light btn red modal-trigger" href="#delete{{$zona->id}}"><i class="fa fa-times-circle"></i></a>
							</td>	
						</tr>
					@endforeach
				@else
					<tr style="cursor: pointer;">
						<td></td>
						<td></td>
						<td></td>
					</tr>

				@endif
				



			  </tbody>
			  <tfoot>
			  	<tr>
			  		
			      	<th>Nombre</th>
			      	      	
			      	<th></th>
			  	</tr>

			  </tfoot>
			  </table>
			  

			  </div>
			</div>
				
		</div>
		
		
		
	</div>
</div>





  <div id="nueva" class="modal">
  	<form action="{{ url('/agregar-zona') }}" method="post" enctype="multipart/form-data">
	    <div class="modal-content">
	      <h4>Añadir nueva</h4>
				{!! csrf_field() !!}
				<div class="input-field col m8">
		          <input id="nombre" name="nombre" type="text" class="validate" value="{{old('nombre')}}" required>
		          <label for="nombre">Nombre de la zona</label>
		        </div>
		        <div class="col m4">
		        	<input type="submit" value="Guardar" class="btn btn-primary right waves-effect waves-light">
		        </div>
		        <p>&nbsp;</p><p>&nbsp;</p>
	    </div>
    </form>
  </div>

  @if($zonas)
	@foreach($zonas as $zona)
	<!-- Modal Structure -->
	  <div id="delete{{$zona->id}}" class="modal">
	    <div class="modal-content">
	      <h4>Eliminar zona ({{$zona->nombre}})</h4>
	      <p>¿Está seguro que desea eliminar esta zona?</p>

	      <a href="#!" class="modal-action modal-close waves-effect waves-green btn" style="float: right;">Cancelar</a> 
				<form action="{{ url('/eliminar-zona') }}" method="post" enctype="multipart/form-data">
				{{ method_field('DELETE') }}
				{!! csrf_field() !!}
				<input type="hidden" name="eliminar" value="{{$zona->id}}" style="float: right;">
				<input type="submit" class="modal-action modal-close waves-effect waves-green red btn" value="Eliminar" style="float: right;">
			</form>
			<p>	&nbsp;</p>
	    </div>


	  </div>



	  <!-- Modal Structure -->
	  <div id="update{{$zona->id}}" class="modal">
	  	<form action="{{ url('/actualizar-zona') }}" method="post" enctype="multipart/form-data">
	    <div class="modal-content">
	      <h4>Editar ({{$zona->nombre}})</h4>
				{!! csrf_field() !!}
				<div class="input-field col m8">
					<input type="hidden" value="{{$zona->id}}" name="id">
		          <input id="nombre" name="nombre" type="text" class="validate" value="{{ $zona->nombre or old('nombre')}}" required>
		          <label for="nombre">Nombre del zona</label>
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