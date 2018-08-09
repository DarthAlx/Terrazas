@extends('templates.admin')

@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		
		<form action="{{ url('/agregar-venue') }}" method="post" enctype="multipart/form-data">
			 {{ csrf_field() }}
		<div class="row">
			<div class="col-md-6">
				<h3 class="">Añadir nuevo</h3>
			</div>
			<div class="col-md-6 text-right valign-wrapper" style="justify-content: space-between;">
				<div class="text-center" style="margin-left: auto; margin-top: 20px;">
					<input type="submit" value="Guardar" class="btn btn-primary right waves-effect waves-light btn-large">
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				@include('snip.notificaciones')
				@if(!$servicios)
				<div class="alert alert-warning alert-dismissable">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				    <ul>
				        <li>Aún no se han creado servicios, te recomendamos ir a la sección <a href="{{url('/servicios')}}">servicios</a> y crear los necesarios.</li>
				    </ul>
				  </div>
				@endif
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-8">
				

				    <h5>Detalles</h5>

				    	<div class="col s12">
					      <div class="row">
					        <div class="input-field col col-md-6">
					          <input id="nombre" name="nombre" type="text" class="validate" value="{{old('nombre')}}" required>
					          <label for="nombre">Nombre</label>
					        </div>
					        <div class="input-field col col-md-6">
									<select name="zona_id" id="zona" class="select" required>
										<option value="">Selecciona</option>
										@foreach($zonas as $zona)
										<option value="{{$zona->id}}">{{$zona->nombre}}</option>
										@endforeach
									</select> 
									<label for="zona">Zona</label>
									<script>
										document.getElementByID('zona').value="{{old('zona')}}";
									</script>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col col-md-6">
					          <input id="capacidad" name="capacidad" type="number" class="validate" value="{{old('capacidad')}}" required>
					          <label for="capacidad">Capacidad</label>
					        </div>
					        <div class="input-field col col-md-6">
					          <select name="tipo" id="tipo" class="select" required>
					          	<option value="">Selecciona</option>
					          	<option value="Salón">Salón</option>
					          	<option value="Terraza">Terraza</option>
					          	<option value="Jardín">Jardín</option>
					          </select>
					          <label for="tipo">Tipo</label>
					          <script>
						        	document.getElementByID('tipo').value="{{old('tipo')}}";
						        </script>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12">
					        	<label for="descripcion">Descripción</label>
					        	
					          <textarea id="descripcion" name="descripcion" class="materialize-textarea" required>{{old('descripcion')}}</textarea>
					          
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12">
					        	<label for="direccion">Dirección</label>
					        	
					          <textarea id="direccion" name="direccion" class="materialize-textarea" required>{{old('direccion')}}</textarea>
					          
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col col-md-6">
					          <input id="latitud" name="latitud" type="tel" class="validate" value="{{old('latitud')}}" required>
					          <label for="latitud">Latitud</label>
					        </div>
					        <div class="input-field col col-md-6">
					          <input id="longitud" name="longitud" type="tel" class="validate" value="{{old('longitud')}}" required>
					          <label for="longitud">Longitud</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12">
					        	<label for="reglamento">Reglamento</label>
					        	
					          <textarea id="reglamento" name="reglamento" class="materialize-textarea" required>{{old('reglamento')}}</textarea>
					          
					        </div>
					      </div>	
					      <!--div class="row">
					        <div class="col s4">
					        	<div class="switch">
								    <label>
								      <input type="checkbox" name="habilitado" id="habilitado" checked="checked"/>
								      <span class="lever"></span>
								      
								    </label>
								  </div>
					          <p>      
							      <label for="habilitado">Habilitado</label>
						      </p>
					        </div>
					        <p>&nbsp;</p>

					        <div class="col s4">
					        	<div class="switch">
								    <label>
								      <input type="checkbox" name="destacado" id="destacado"/>
								      <span class="lever"></span>
								      
								    </label>
								  </div>
					          <p>      
							      <label for="destacado">Destacado</label>
						      </p>
					        </div>




					      </div-->
					      
					    </div>


				
			
			</div>

			<div class="col-md-4">

				    <h5>Servicios incluidos</h5>
				    <div>
				    	@if($servicios)
				    	@foreach($servicios as $servicio)
					      <div class="row">
					        <div class="col s6">
					          <p>
							      <input type="checkbox" name="servicio[]" value="{{$servicio->id}}" id="cat{{$servicio->id}}"/>
							      <label for="cat{{$servicio->id}}">{{$servicio->nombre}}</label>
						      </p>
					        </div>
					      </div>
					    @endforeach
					    @endif
				    </div>

				    <h5>Servicios extra</h5>
				    <div>
				    	@if($serviciosextra)
				    	@foreach($serviciosextra as $servicioextra)
					      <div class="row">
					        <div class="col s6">
					          <p>
							      <input type="checkbox" name="serviciosextra[]" value="{{$servicioextra->id}}" id="ext{{$servicioextra->id}}"/>
							      <label for="ext{{$servicioextra->id}}">{{$servicioextra->nombre}}</label>
						      </p>
					        </div>
					      </div>
					    @endforeach
					    @endif
				    </div>

				  


				
				    <h5>Imágen destacada</h5>
				    <div>
					      <div class="file-field input-field">
						      <div class="btn">
						        <span>Subir</span>
						        <input type="file" name="imagen">
						      </div>
						      <div class="file-path-wrapper">
						        <input class="file-path validate" type="text">
						      </div>
						    </div>
				    </div>

				  


				
				    <h5 >Galería</h5>
				    <input name="poplets" type="hidden" class="popletsnum">
				    <div class="popletsinput">
				      <div class="file-field input-field poplet1">
					      <div class="btn">
					        <span>Subir</span>
					        <input type="file" name="poplet1">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>
					    </div>

					    <div class="file-field input-field poplet2" style="display: none;">
					      <div class="btn">
					        <span>Subir</span>
					        <input type="file" name="poplet2">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>
					    </div>


					    <div class="file-field input-field poplet3" style="display: none;">
					      <div class="btn">
					        <span>Subir</span>
					        <input type="file" name="poplet3">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>
					    </div>

					    <div class="file-field input-field poplet4" style="display: none;">
					      <div class="btn">
					        <span>Subir</span>
					        <input type="file" name="poplet4">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>
					    </div>

				    </div>
				    <div class="text-right popletscontrols">
				    	<a class="minus" style="display: none;" onclick="popletremove();"><i class="fa fa-minus fa-2x" aria-hidden="true"></i></a>
				    <a class="plus" onclick="popletappend();"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
				    </div>
				    


				<script>
					var poplet=1;
					function popletappend(){
						poplet++;
						$( ".poplet"+poplet ).fadeIn();
						
						$('.minus').fadeIn();
						$('.popletsnum').val(poplet);
						if(poplet>=4){
							$('.plus').fadeOut();
						}
					}
					function popletremove(){
						$( ".poplet"+poplet ).fadeOut();
						poplet--;
						if(poplet<2){
							$('.minus').fadeOut();
						}
						if(poplet<5){
							$('.plus').fadeIn();
						}
						$('.popletsnum').val(poplet);
					}
				</script>




			</div>
		</div>
		
	</div>
	</form>
</div>
@endsection

@section('scripts')
<script>
        /*ClassicEditor
            .create( document.querySelector( '#descripcion' ),{
            	lenguage: 'es'
            } )
            .catch( error => {
                console.error( error );
            } );
            ClassicEditor
            .create( document.querySelector( '#direccion' ),{
            	lenguage: 'es'
            } )
            .catch( error => {
                console.error( error );
            } );
            ClassicEditor
            .create( document.querySelector( '#reglamento' ),{
            	lenguage: 'es'
            } )
            .catch( error => {
                console.error( error );
            } );*/
    </script>
@endsection