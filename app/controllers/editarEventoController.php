<?php
class EditarEventoController extends BaseController {


	public function get_nuevo(){

		$concursos = Concurso::where('fecha','>',date('Y-m-d'))
		->orderBy('fecha','asc')
		->get();
		$ferias = Feria::where('fechafin','>',date('Y-m-d'))
		->orderBy('fechafin','asc')
		->get();
		$talleres = Taller::where('fechafin','>',date('Y-m-d'))
		->orderBy('fechafin','asc')
		->get();

		return View::make('artesano/editarEventos')->with('concursos',$concursos)->with('ferias',$ferias)->with('talleres',$talleres);
	}

	public function updateTaller(){
		$taller=Taller::find(Input::get("id"))->update(array(
			"nombre"  => Input::get("tallernombre"),
			"maestro"  => Input::get("maestro"),
			"fechainicio"  => Input::get("fecha1"),
			"fechafin"  => Input::get("fecha2"),

			));
		return Response::json(array('success' => true));
	}
	public function updateFeria(){
		$feria=Feria::find(Input::get("id"))->update(array(
			"nombre"  => Input::get("ferianombre"),
			"tipo"  => Input::get("tipo"),
			"lugar"  => Input::get("ferialugar"),
			"fechainicio"  => Input::get("fecha1"),
			"fechafin"  => Input::get("fecha2"),

			));
		return Response::json(array('success' => true));
	}
	public function updateConcurso(){
		$concurso=Concurso::find(Input::get("id"))->update(array(
			"nombre"  => Input::get("concurnombre"),
			"fecha"  => Input::get("fecha1"),
			"nivel"  => Input::get("nivel"),
			"premiacion"  => Input::get("fecha2")

			));
		return Response::json(array('success' => true));
	}
}
