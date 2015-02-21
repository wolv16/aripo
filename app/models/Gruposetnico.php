<?php
 class Gruposetnico extends Eloquent{
 	public $timestamps = false;
 	protected $table = 'gruposetnicos';
 	protected $fillable= array('nombre');

public function Personas(){
	return $this->hasMany('Persona');
}
 }