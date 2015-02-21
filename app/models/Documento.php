<?php

class Documento extends Eloquent {
public $timestamps = false;
protected $table = 'documentos';
protected $fillable = array('nombre', 'ruta', 'persona_id');


public function Personas(){
return $this->belongTo('Persona');
}

}