<?php

class Organizacion extends Eloquent {
public $timestamps = false;
protected $table = 'organizaciones';
protected $fillable = array('nombre', 'telefono');

public function Comite(){
return $this->hasOne('Comite');
}
public function Artesanos(){
return $this->belongsToMany('Artesano');
}
}

