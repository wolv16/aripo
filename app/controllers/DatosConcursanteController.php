<?php
class DatosConcursanteController extends BaseController {

	public function verConcursante(){
		return View::make('artesano/datosconcursante');
	}

	

	public function buscar()
	{
		$nombre 	= Input::get('artesanombre');
		$paterno 	= Input::get('artesapaterno');
		$materno 	= Input::get('artesamaterno');
		$artesanos 	= Artesano::whereHas('persona',function($q) use ($nombre,$paterno,$materno)
		{
			$q->where('nombre','like','%'.$nombre.'%','and')
			->where('paterno','like','%'.$paterno.'%','and');
		})
		->get();
		$datos = array();
		foreach ($artesanos as $artesano) {
			$datos[] = array(
				'id' => $artesano -> id,
				'nombre' => $artesano -> persona -> nombre,
				'paterno' => $artesano -> persona -> paterno,
				'materno' => $artesano -> persona -> materno,
				'cumple' => $artesano -> persona -> fechanacimiento,
			);
		}

		return Response::json($artesano);

	}

	public function buscarmodal()
	{
		$artesano = Artesano::find(Input::get('id'));

		$artesano["persona"]["localidad_id"] 	= Localidad::find($artesano->persona->localidad_id)->nombre;
		$artesano["persona"]["grupoetnico_id"] 	= Gruposetnico::find($artesano->persona->grupoetnico_id)->nombre;
		$artesano["persona"]["rama_id"]	=	Rama::find($artesano->persona->rama_id)->nombre;
		$artesano["persona"]["direccion"]	=	$artesano -> persona -> direccion;
		$artesano["persona"]["telefono"]	=	$artesano -> persona -> telefono;
		$artesano["documentos"]		=	Documento::where('persona_id','=',$artesano->persona_id)->get();
		$artesano["compras"]		=	$artesano->comprasyventas()->get();
		$artesano["organizacion"]	=	$artesano->organizacion;
		$artesano["concursos"]		=	$artesano->concursos()->get();
		$artesano["ferias"]		=	$artesano->ferias()->get();
		$artesano["talleres"]		=	$artesano->talleres()->get();

		return Response::json($artesano);

	}

	public function buscar2()
	{
		$nombre 	= Input::get('artesanombre');
		$paterno 	= Input::get('artesapaterno');
		$artesano 	= Artesano::whereHas('persona',function($q) use ($nombre,$paterno)
		{
			$q->where('nombre','like','%'.$nombre.'%','and')
			->where('paterno','like','%'.$paterno.'%','and');
		})
		->get();
		return Response::json($artesano);

	}

	public function encontrado()
	{
		$artesano 	= Artesano::find(Input::get('id'));
		$artesano["persona"]["localidad_id"]	= Localidad::find($artesano->persona->localidad_id)->id;
		$artesano["persona"]["grupoetnico_id"]	= Gruposetnico::find($artesano->persona->grupoetnico_id)->id;
		$artesano["persona"]["rama_id"]	= Rama::find($artesano->persona->rama_id)->id;
		$artesano["documentos"] 	=	Documento::where('persona_id','=',$artesano->persona_id)->get();
		$artesano["compras"] 	=	$artesano->comprasyventas()->get();
		$artesano["organizacion"] = $artesano->organizacion;
		$artesano->persona->Direccion;
		$artesano->persona->Telefono;
		return Response::json($artesano);
	}

	public function update(){
		$objt = Artesano::find(Input::get('personaid'));
		if(is_null($objt))
			$objt = Persona::find(Input::get('personaid'));
		if($objt->concursos()->where('concurso_id','=',Input::get('concursoid'))->update(array(
			'entrego' 	=> Input::get('entrego'),
			'fechadev' 	=> Input::get('fecha'),
			'premio' 	=> Input::get('premio')
			)))
		return Response::json(array('success'=>true,'id'=>Input::get('personaid')));

		return Response::json(array('error'=>true));

	}
}
