<?php
class ArtesanoEnFeriaController extends BaseController {

public function get_ArtesanoEnFeria(){

$ferias = Feria::where('fechafin','>',date('Y-m-d'))
		->orderBy('fechafin','asc')
		->get();
		return View::make('artesano.ArtesanoEnFeria')->with('ferias',$ferias);
	}
public function buscar()
{
	$nombre = Input::get('artesanombre');
	$paterno = Input::get('artesapaterno');
	$materno = Input::get('artesamaterno');

	$artesanos = Artesano::whereHas('persona',function($q) use ($nombre,$paterno,$materno)
	{
	$q->where('nombre','like','%'.$nombre.'%','and')
	->where('paterno','like','%'.$paterno.'%','and')
	->where('materno','like','%'.$materno.'%');
	})
	->get();
	if($artesanos){
		foreach ($artesanos as $artesano) {
			$artesano->persona->rama;
		}
		return Response::json($artesanos);
	}
	else
		return Response::json(array('error'=>true));
// $artesano["persona"]["localidad_id"]=Localidad::find($artesano->persona->localidad_id)->nombre;
// $artesano["persona"]["grupoetnico_id"]=Gruposetnico::find($artesano->persona->grupoetnico_id)->nombre;
// $artesano["persona"]["rama_id"]=Rama::find($artesano->persona->rama_id)->nombre;
// $artesano["organizacion"]=$artesano->organizacion;
}

public function registrar(){
$objt = Artesano::find(Input::get('artesanoid'));
if(!is_null($objt->Ferias()->where('feria_id','=',Input::get('feriaid'))->first()))
			return Response::json(array('error'=>true));
$objt->Ferias()->attach(Input::get('feriaid'));
return Response::json(array('success'=>true));
}
}