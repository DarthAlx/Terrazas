@extends('templates.default')


@section('header')
<style>
  .headerindex{
    display: none;
  }
</style>
@endsection
@section('pagecontent')

	<div class="main">
		<div class="col-md-12" style="background: url({{url('img/terraza1.jpg')}}); background-size: cover; background-position: center center; height: 60vh;"></div>
		

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4><strong>Terraza 1</strong></h4>
					<p>Aquí la dirección completa de la terraza</p>
					
				</div>
			</div>
		</div>
		

	</div>

@endsection