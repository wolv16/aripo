<?php

class Feria extends Eloquent {
public $timestamps = false;
protected $table ='ferias';
protected $fillable = array('nombre', 'fechainicio','fechafin','tipo','lugar');

public function Artesanos(){
return $this->belongsToMany('Artesano');
}
}

