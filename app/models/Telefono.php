<?php

class Telefono extends Eloquent {
public $timestamps = false;
protected $table = 'telefonos';
protected $fillable = array('numero','lada','tipo', 'persona_id');

public function Persona(){
return $this->belongsTo('Persona');
}

}