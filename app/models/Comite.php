<?php

class Comite extends Eloquent {

	public $timestamps = false;
	protected $table = 'comites';
	protected $fillable = array('organizacion_id');


public function Artesanos(){
return $this->belongsToMany('Artesano')->withPivot('cargo');
}
public function Organizacion(){
return $this->belongsTo('Organizacion');
}
}

