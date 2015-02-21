<?php
 class Distrito extends Eloquent{
 	public $timestamps = false;
 	protected $table = 'distritos';
 	
public function Region(){
	return $this->belongsTo('Region');
}
 public function Municipios(){
 	return $this->hasMany('Municipio');
 }
 }