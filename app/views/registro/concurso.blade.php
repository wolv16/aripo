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
		label{
			padding: 0 15px;
		}
	</style>
</head>
<body>
	<CENTER>
		<h2>CONCURSO {{Concurso::find($concurso->concurso_id)->nombre}}</h2>
		<label>Nivel: {{Concurso::find($concurso->concurso_id)->nivel}}</label>
		<label>Fecha de inicio: {{Concurso::find($concurso->concurso_id)->fecha}}</label>
	</CENTER>
	<br>
	<br>
	<center>
	<h3>DATOS DEL PARTICIPANTE</h3>
	</center>
 <label>Nombre: <u>{{$persona->nombre}}</u></label>
 <label>fecha de nacimiento: <u>{{$persona->fechanace}}</u></label>
 <label>No. Registro: <u>{{$concurso->numregistro}}</u></label>
 <br>
 <br>
 <label>CURP: <u>{{$persona->curp}}</u></label>
 <label>Sexo: <u>{{$persona->sexo}}</u></label>
 <label>Grupo etnico: <u>{{$persona->Grupoetnico->nombre}}</u></label>
 <br>
 <br>
 <label>Domicilio: <u>{{$persona->domicilio}}</u></label>
 <br>
 <br>
 <label>Municipio: <u>{{$persona->localidad->municipio->nombre}}</u></label>
 <label>Localidad: <u>{{$persona->localidad->nombre}}</u></label>
 <label>CP: <u>{{$persona->cp}}</u></label>
 <br>
 <br>
 <label>Lada: <u>{{$persona->telefono->lada}}</u></label>
 <label>Telefono: <u>{{$persona->telefono->numero}}</u></label>
 <label>Rama: <u>{{$persona->rama->nombre}}</u></label>
 <br>
 <br>
 <CENTER>
 <h3>DATOS DE LA PIEZA</h3>
 </CENTER>
 <label>Categoria: <u>{{$concurso->categoria}}</u></label>
 <label>Pieza: <u>{{$concurso->pieza}}</u></label>
 <label>Costo: <u>${{$concurso->costounitario}}</u></label>
 <br>
 <br>
 <label>Avaluo: <u>{{$concurso->avaluo}}</u></label>
 <label>Entrego: <u>{{$concurso->entrego}}</u></label>
 <label>Observaciones: <u>{{$concurso->observaciones}}</u></label>
 <br>
 <br>
 <label>Calidad: <u>{{$concurso->calidad}}</u></label>
 <label>Recibio: <u>{{$concurso->recibio}}</u></label>
 <br>
 <br>
</body>
</html>