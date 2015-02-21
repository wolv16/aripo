<?php
 class Municipio extends Eloquent{
 	public $timestamps = false;
 	protected $table = 'municipios';

public function Distrito(){
	return $this->belongsTo('Distrito');
}
 public function Localidades(){
 	return $this->hasMany('Localidad');
 }
 }