<?php

class Taller extends Eloquent {
public $timestamps = false;
protected $table = 'talleres';
protected $fillable = array('nombre','fechainicio','fechafin','maestro');

public function Artesanos(){
return $this->belongsToMany('Artesano');
}
}

