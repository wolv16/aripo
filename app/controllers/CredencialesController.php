<?php
 
class CredencialesController extends BaseController {
 
    public function getIndex()
    {
        return View::make('credenciales.credenciales');
    }
    public function postArtesano(){
        $nombre     = Input::get('artesanombre');
        $paterno    = Input::get('artesapaterno');
        $materno    = Input::get('artesamaterno');

        $artesanos   = Artesano::whereHas('persona',function($q) use ($nombre,$paterno,$materno)
        {
            $q->where('nombre','like','%'.$nombre.'%','and')
            ->where('paterno','like','%'.$paterno.'%','and')
            ->where('materno','like','%'.$materno.'%');
        })
        ->get();
        if(!is_null($artesanos)){
            foreach ($artesanos as $artesano) {
               $artesano->persona->rama;
            }
            return Response::json($artesanos);
        }
        return Response::json(array('success' => false));
    }
    public function postCredencial(){
        $artesano = Input::get("id");
        //return View::make('credenciales.imprimir')->with('artesanos',array($artesano));
        $html =  View::make('credenciales.imprimir')->with('artesanos',array($artesano));
        $pdf = App::make('dompdf');
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
    public function postOrganizacion(){
        $Organizacion = Organizacion::find(Input::get('id'));
        if(!is_null($Organizacion))
            $artesanos = $Organizacion->artesanos()->get();
            $personas = array();
            foreach ($artesanos as $artesano) {
                $personas[] = array($artesano->persona->id,
                    $artesano->persona->nombre.' '.$artesano->persona->paterno.' '.$artesano->persona->materno,
                    $artesano->persona->fechanacimiento
                    );
            }
            return Response::json(array('success' => true,'organizacion' => $Organizacion,'artesanos' => $personas));
        return Response::json(array('success' => false));
    }
    public function postCredenciales(){
        $artesanos = Input::all();
        $personas = array();
        foreach ($artesanos as $key => $value) {
            if(is_integer($key))
                $personas[]=$key;
        }
        if(Input::get('todos')){
            $artesanos = Organizacion::find(Input::get('org_id'))->artesanos()->get();
            $personas = array();
            foreach ($artesanos as $artesano) {
                $personas[] = $artesano->persona->id;
            }
        }
        //return View::make('credenciales.imprimir')->with('artesanos',$personas);
        $html =  View::make('credenciales.imprimir')->with('artesanos',$personas);
        $pdf = App::make('dompdf');
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
    public function postImprimirregistro(){
        if(Input::get('registroartesano') != ""){
            $persona = Artesano::find(Input::get('registroartesano'))->persona;
            $concurso = Artesano::find(Input::get('registroartesano'))->Concursos()->where('concurso_id','=',Input::get('registroconcid'))->first();
        }
        else{
            $persona = Persona::find(Input::get('registropersona'));
            $concurso = $persona->Concursos()->where('concurso_id','=',Input::get('registroconcid'))->first();
        }
        $html =  View::make('registro.concurso')
        ->with('persona',$persona)
        ->with('concurso',$concurso->pivot);
        $pdf = App::make('dompdf');
        $pdf->loadHTML($html);
        return $pdf->stream();

    }
}
?>