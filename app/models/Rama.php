<?php

class Rama extends Eloquent {
public $timestamps = false;
protected $table = 'ramas';
protected $fillable= array('nombre');

public function Personas(){
return $this->hasMany('Persona');
}
}

