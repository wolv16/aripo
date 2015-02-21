<?php
 
class OrganizacionesController extends BaseController {
 	
    public function Organizaciones(){  
       return View::make('catalogos/organizaciones')->with('organizaciones',Organizacion::all());
    }

    public function NuevaOrg(){
		$rules = array(
			'nombre' 	=> 'required',
			);
		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		  return Redirect::back()->withInput()->with('status', 'fail_create');
		}
		if(is_null(Organizacion::where('nombre','=',Input::get('nombre'))->first()) ){
			$org = new Organizacion;
				$org->nombre 	= Input::get('nombre');
				$org->telefono 	= Input::get('tel');
			$org->save();
			$Comite = Comite::create(array(
			'organizacion_id' => $org->id));
			return Response::json(array('success' => true));
		}
		else
			return Response::json(array('ocupado' => true));
	}
	public function UpdateOrg(){
		$rules = array(
			'nombre' 		=>	'required',
			'id'			=>	'integer|required',
			'tel' 			=>	'integer|required');

		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		 return Response::json(array('success' => false));
		}
		$org = Organizacion::where('nombre','=',Input::get('nombre'))->first();
		if(!is_null($org) )
			if($org->id != Input::get('id'))
					return Response::json(array('ocupado' => true));
			$org = Organizacion::find(Input::get('id'));
			$org->update(array(
				'nombre' 	=> Input::get('nombre'),
				'telefono' 	=> Input::get('tel'),
				));
		return Response::json(array('success' => true));
	}
	public function EliminarOrg()
		{
			$rules = array(
				'org' => 'integer|required',
				);
			$validation = Validator::make(Input::all(), $rules);
			if($validation->fails()){		
			  return Response::json(array('success' => false));
			}
			//buscamos la org en la base de datos segun la id enviada
			$org = Organizacion::find(Input::get('org'));
			$org->delete();
			return Response::json(array('success' => true));
		}

	public function Comite(){
		$comite = Comite::where('organizacion_id','=',Input::get('id'))->first();
		$artesanos = $comite->Artesanos()->get();
		$comite = array();
		foreach ($artesanos as $artesano) {
			$tel='';
			if(!is_null($artesano->persona->telefono))
				$tel = $artesano->persona->telefono->numero;
			$comite[] = array(
				$artesano->persona->nombre,
				$artesano->persona->paterno,
				$artesano->persona->materno,
				$artesano->persona->fechanacimiento,
				$artesano->persona->sexo,
				$artesano->persona->cuis,
				$tel,
				$artesano->pivot->cargo
				);
		}
		$organizacion = Organizacion::find(Input::get('id'));
		$artesanos = array();
		foreach ($organizacion->Artesanos()->get() as $persona) {
			$tel='';
			if(!is_null($persona->persona->telefono))
				$tel = $persona->persona->telefono->numero;
			$artesanos[] = array(
				$persona->persona->nombre,
				$persona->persona->paterno,
				$persona->persona->materno,
				$persona->persona->fechanacimiento,
				$persona->persona->sexo,
				$persona->persona->cuis,
				$tel
				); 
		}
		return Response::json(array('comite' => $comite,'artesanos' => $artesanos));
	}
}


?>