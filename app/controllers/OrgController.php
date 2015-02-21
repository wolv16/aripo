<?php
class OrgController extends BaseController {
 	
    public function getIndex(){  
       return View::make('organizaciones/organizaciones')->with('organizaciones',Organizacion::all());
    }
    public function postListar()
    {
		$artesanos = Organizacion::find(Input::get('id')) -> artesanos() -> get();
		$artesanoArr = array();
		foreach ($artesanos as $artesano) {
			$artesanoArr [] = array(
				$artesano -> persona -> nombre,
				$artesano -> persona -> paterno,
				$artesano -> persona -> materno,
				$artesano -> persona -> fechanacimiento,
				$artesano -> rfc,
				$artesano -> id,
			);
		}
		return Response::json($artesanoArr);
    }
    public function postEliminar()
    {
    	if(Artesano::find(Input::get('artesano')) -> Organizacion() -> detach(Input::get('organizacion')))return Response::json(array('success' => true));
    	else 
    		return Response::json(array('error' => true));
    }
}