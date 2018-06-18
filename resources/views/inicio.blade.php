@extends('templates.default')


@section('header')
<style>
  .headerindex{
    display: block !important;
  }
  .headergrande{
  	background: transparent;
    height: 85px;
  }
  .nbsp{
  	display: none;
  }

</style>
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
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="terraza-small">
						<a href="{{url('/terraza')}}" class="link-wrapper">
							<img src="{{url('/img/terraza1.jpg')}}" class="img-responsive" alt="">
							<div class="title-wrapper">
								<a href="#" class="title">
									Terraza 1
								</a>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="terraza-small">
						<a href="{{url('/terraza')}}" class="link-wrapper">
							<img src="{{url('/img/terraza1.jpg')}}" class="img-responsive" alt="">
							<div class="title-wrapper">
								<a href="#" class="title">
									Terraza 2
								</a>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="terraza-small">
						<a href="{{url('/terraza')}}" class="link-wrapper">
							<img src="{{url('/img/terraza1.jpg')}}" class="img-responsive" alt="">
							<div class="title-wrapper">
								<a href="#" class="title">
									Terraza 3
								</a>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="terraza-small">
						<a href="{{url('/terraza')}}" class="link-wrapper">
							<img src="{{url('/img/terraza1.jpg')}}" class="img-responsive" alt="">
							<div class="title-wrapper">
								<a href="#" class="title">
									Terraza 4
								</a>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="terraza-small">
						<a href="{{url('/terraza')}}" class="link-wrapper">
							<img src="{{url('/img/terraza1.jpg')}}" class="img-responsive" alt="">
							<div class="title-wrapper">
								<a href="#" class="title">
									Terraza 5
								</a>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="terraza-small">
						<a href="{{url('/terraza')}}" class="link-wrapper">
							<img src="{{url('/img/terraza1.jpg')}}" class="img-responsive" alt="">
							<div class="title-wrapper">
								<a href="#" class="title">
									Terraza 6
								</a>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="terraza-small">
						<a href="{{url('/terraza')}}" class="link-wrapper">
							<img src="{{url('/img/terraza1.jpg')}}" class="img-responsive" alt="">
							<div class="title-wrapper">
								<a href="#" class="title">
									Terraza 7
								</a>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="terraza-small">
						<a href="{{url('/terraza')}}" class="link-wrapper">
							<img src="{{url('/img/terraza1.jpg')}}" class="img-responsive" alt="">
							<div class="title-wrapper">
								<a href="#" class="title">
									Terraza 8
								</a>
							</div>
						</a>
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