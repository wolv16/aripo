<?php
 class Comprasyventa extends Eloquent{
 	public $timestamps = false;
	protected $table = 'comprasyventas';
	protected $fillable= array('nombre');

public function Artesanos(){
	return $this->belongsToMany('Artesano');
}

 }