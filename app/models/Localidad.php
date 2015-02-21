<?php
 class Localidad extends Eloquent{
 	public $timestamps = false;
 	protected $table = 'localidades';

public function Municipio(){
	return $this->belongsTo('Municipio');
}
 public function Personas(){
 	return $this->hasMany('Persona');
 }
 }