<?php

class Direccion extends Eloquent {
public $timestamps = false;
protected $table = 'direcciones';
protected $fillable = array('calle', 'numero','colonia','cp', 'persona_id');

public function Persona(){
return $this->belongsTo('Persona');
}

}