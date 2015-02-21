<?php
 class Region extends Eloquent{
 	public $timestamps = false;
 	protected $table = 'regiones';

 public function Distritos(){
 	return $this->hasMany('Distrito');
 }
 }