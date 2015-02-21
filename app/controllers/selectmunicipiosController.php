<?php

class selectmunicipiosController extends BaseController {

	public function post_mun(){
		return Response::json(Localidad::where('municipio_id','=',Input::get('id'))->get());
	} 

}