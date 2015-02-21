<?php
 
class CatalogosController extends BaseController {
 	
    public function Ramas(){
       
       return View::make('catalogos/ramas')->with('ramas',Rama::all());
    }

    public function NuevaRama(){
		$rules = array(
			'nombre' 	=> 'required',
			);
		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		  return Redirect::back()->withInput()->with('status', 'fail_create');
		}
		if(is_null(Rama::where('nombre','=',Input::get('nombre'))->first()) ){
			$rama = new Rama;
				$rama->nombre 	= Input::get('nombre');
			$rama->save();
			return Response::json(array('success' => true));
		}
		else
			return Response::json(array('ocupado' => true));
	}
	public function UpdateRama(){
		$rules = array(
			'nombre' 	=>	'required',
			'id'		=>	'integer|required'
			);
		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		 return Response::json(array('success' => false));
		}
		$rama = Rama::where('nombre','=',Input::get('nombre'))->first();
		if(!is_null($rama) )
			if($rama->id != Input::get('id'))
					return Response::json(array('ocupado' => true));
			$rama = Rama::find(Input::get('id'));
			$rama->update(array(
				'nombre' 	=> Input::get('nombre'),
				));
		return Response::json(array('success' => true));
	}
	public function EliminarRama()
		{
			$rules = array(
				'rama' => 'integer|required',
				);
			$validation = Validator::make(Input::all(), $rules);
			if($validation->fails()){		
			  return Response::json(array('success' => false));
			}
			//buscamos la rama en la base de datos segun la id enviada
			$rama = Rama::find(Input::get('rama'));
			$rama->delete();
			return Response::json(array('success' => true));
		}

	public function Grupos(){
       
       return View::make('catalogos/gruposetnicos')->with('grupos',Gruposetnico::all());
    }

    public function NuevoGrupo(){
		$rules = array(
			'nombre' 	=> 'required',
			);
		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		  return Redirect::back()->withInput()->with('status', 'fail_create');
		}
		if(is_null(Gruposetnico::where('nombre','=',Input::get('nombre'))->first()) ){
			$grupo = new Gruposetnico;
				$grupo->nombre 	= Input::get('nombre');
			$grupo->save();
			return Response::json(array('success' => true));
		}
		else
			return Response::json(array('ocupado' => true));
	}
	public function UpdateGrupo(){
		$rules = array(
			'nombre' 	=>	'required',
			'id'		=>	'integer|required'
			);
		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		 return Response::json(array('success' => false));
		}
		$grupo = Gruposetnico::where('nombre','=',Input::get('nombre'))->first();
		if(!is_null($grupo) )
			if($grupo->id != Input::get('id'))
					return Response::json(array('ocupado' => true));
			$grupo = Gruposetnico::find(Input::get('id'));
			$grupo->update(array(
				'nombre' 	=> Input::get('nombre'),
				));
		return Response::json(array('success' => true));
	}

	public function DeleteGrupo()
			{
				$rules = array(
					'grupo' => 'integer|required',
					);
				$validation = Validator::make(Input::all(), $rules);
				if($validation->fails()){		
				  return Response::json(array('success' => false));
				}
				//buscamos el grupo en la base de datos segun la id enviada
				$grupo = Gruposetnico::find(Input::get('grupo'));
				$grupo->delete();
				return Response::json(array('success' => true));
			}


	public function Comprasyventas(){
       
       return View::make('catalogos/comprasyventas')->with('comprasyventas',Comprasyventa::all());
    }

    public function Nuevacv(){
		$rules = array(
			'nombre' 	=> 'required',
			);
		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		  return Redirect::back()->withInput()->with('status', 'fail_create');
		}
		if(is_null(Comprasyventa::where('nombre','=',Input::get('nombre'))->first()) ){
			$comprasyventa = new Comprasyventa;
				$comprasyventa->nombre 	= Input::get('nombre');
			$comprasyventa->save();
			return Response::json(array('success' => true));
		}
		else
			return Response::json(array('ocupado' => true));
	}
	public function Updatecv(){
		$rules = array(
			'nombre' 	=>	'required',
			'id'		=>	'integer|required'
			);
		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		 return Response::json(array('success' => false));
		}
		$comprasyventa = Comprasyventa::where('nombre','=',Input::get('nombre'))->first();
		if(!is_null($comprasyventa) )
			if($comprasyventa->id != Input::get('id'))
					return Response::json(array('ocupado' => true));
			$comprasyventa = Comprasyventa::find(Input::get('id'));
			$comprasyventa->update(array(
				'nombre' 	=> Input::get('nombre'),
				));
		return Response::json(array('success' => true));
	}
	public function Eliminarcv()
		{
			$rules = array(
				'comprasyventa' => 'integer|required',
				);
			$validation = Validator::make(Input::all(), $rules);
			if($validation->fails()){		
			  return Response::json(array('success' => false));
			}
			//buscamos la rama en la base de datos segun la id enviada
			$comprasyventa = Comprasyventa::find(Input::get('comprasyventa'));
			$comprasyventa->delete();
			return Response::json(array('success' => true));
		}
}


?>