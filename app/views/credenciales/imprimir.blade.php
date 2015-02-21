<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style type="text/css" media="screen">
		img{
			max-height: 70px;
		}
	</style>
</head>
<body>
	@foreach($artesanos as $key => $artesano)
		<?php $persona = Persona::find($artesano); ?>
	<center>
		<div style="border: 1px solid #000;width: 240px;margin:0 auto;padding:5px 0">
			<h3>Instituto Oaxacaqueño <br> de las Artesanias</h3>
			<div >
				<img src="{{URL::to($persona->documentos()->where('nombre','=','Foto del artesano')->first()->ruta)}}" alt=""><br><br>
				{{$persona->nombre}} {{$persona->paterno}} {{$persona->materno}}<br>
				Rama: <u>{{$persona->rama->nombre}}</u> <br>
				Grupo Etnico: <u>{{$persona->grupoetnico->nombre}}</u> <br>
				INE: <u>{{$persona->artesano->ine}}</u> <br>
				CURP: <u>{{$persona->curp}}</u> <br>
				RFC: <u>{{$persona->artesano->rfc}}</u>
				<u> </u>
			</div>
		</div>
	</center>
		<div style="height:30px;"></div>
		@if(($key+1)%3 == 0 && $key+1 < count($artesanos))
			<div style="page-break-after:always;"></div>
		@endif
	@endforeach
</body>
</html>