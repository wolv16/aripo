<?php

class RegistroOrganizacionController extends BaseController {



	public function get_nuevo()
	{
		return View::make('artesano.organizacion');
	}

public function post_nuevo()
{

$Organizacion = Organizacion::create(array(
	'nombre'=> Input::get('nombreOrg'), 
	'telefono'=> Input::get('telMun'),
	)); 

$Comite = Comite::create(array(
		'organizacion_id' => $Organizacion->id));
	 
	if(!is_null($Organizacion))
	return Redirect::back()->with('status', 'ok_create');
else
	return Redirect::back()->with('status', 'fail_create');

}

	}