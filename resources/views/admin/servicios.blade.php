@extends('templates.admin')
@section('header')
<link rel="stylesheet" href="{{ url('js/data-tables/DT_bootstrap.css') }}" />
@endsection
@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h3 class="">Servicios</h3>
			</div>
			<div class="col-md-6 text-right valign-wrapper" style="justify-content: space-between;">
				<div class="text-center" style="margin-left: auto; margin-top: 20px;">
					<a href="{{url('/usuarios/nuevo')}}" class="btn right waves-effect waves-light btn-large">Añadir nuevo</a>
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
			      	<th>Icono</th>			      	
			      	<th></th>
			  	</tr>
			  </thead>
			  <tbody>
			  	@if($servicios)
			  		@foreach($servicios as $servicio)

						<tr>
							
							
							<td>{{$servicio->name}}</td>
							<td>{{$servicio->email}}</td>							
							<td>
								<a class="waves-effect waves-light btn" href="#"><i class="fa fa-search-plus"></i></a>
								<a class="waves-effect waves-light btn red" href="#"><i class="fa fa-times-circle"></i></a>
									
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
			      	<th>Icono</th>			      	
			      	<th></th>
			  	</tr>

			  </tfoot>
			  </table>
			  

			  </div>
			</div>
				
		</div>
		
		
		
	</div>
</div>



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