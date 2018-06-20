@extends('templates.default')


@section('header')

@endsection
@section('pagecontent')

	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-style-2">EXPLORA</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="sidebar card">
						<label for=""><strong>Precio</strong></label>
						<p class="range-field">
					      <input type="range" id="precio" min="0" max="100" />
					    </p>
						
					</div>
				</div>
				<div class="col-md-9 col-sm-8 col-xs-12">
					<div class="row">
						@foreach($lugares as $venue)
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="terraza-small">
								<a href="{{url('/terraza')}}" class="link-wrapper">
									<img src="{{url('/uploads/venues')}}/{{$venue->imagen}}" class="img-responsive" alt="">
									<div class="title-wrapper">
										<a href="#" class="title">
											{{$venue->nombre}}
										</a>
									</div>
								</a>
							</div>
						</div>
						@endforeach				
					</div>
				</div>
			</div>
		</div>
		<p>&nbsp;</p>
	</div>

	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-style-2">CONTACTO</h3>
				</div>
			</div>
			<div class="row" style="margin-bottom: 0;">
				<div class="col-sm-8">
					<img src="{{url('/img/contact.jpg')}}" class="img-responsive wow bounceInRight" alt="">
				</div>
				<div class="col-sm-4">
					<div class="contact-box wow bounceInLeft">
						<form>
							<h5>CONTÁCTANOS</h5>
		                    <div class="form-group">
		                      <input type="text" class="form-control browser-default" placeholder="Nombre">
		                    </div>
		                    <div class="form-group">
		                      <input type="email" class="form-control browser-default" placeholder="Correo electrónico">
		                    </div>
		                    <div class="form-group">
		                      <input type="tel" class="form-control browser-default" placeholder="Teléfono">
		                    </div>
		                    <div class="form-group">
		                      <textarea class="form-control browser-default" placeholder="Mensaje"></textarea>
		                    </div>
		                    <div class="form-group">
		                      <label for="">&nbsp;</label>
		                      <button type="submit" class="btn btn-default">Enviar <i class="fa fa-send" style="font-size: 1rem;"></i></button>
		                    </div>
		                    
		                 </form>
					</div>
				</div>
			</div>
		</div>
		<p style="margin-bottom: 0;">&nbsp;</p>
	</div>


@endsection