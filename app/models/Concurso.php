<?php

class Concurso extends Eloquent {
public $timestamps = false;
protected $table = 'concursos';
protected $fillable = array('nombre', 'fecha', 'nivel', 'premiacion');

public function Personas(){
	return $this->belongsToMany('Persona')->withPivot('premio','numregistro','categoria','pieza','costounitario','avaluo','entrego','fechadev','calidad','recibio','fecharegistro', 'observaciones');
}

public function Artesanos(){
	return $this->belongsToMany('Artesano')->withPivot('premio','numregistro','categoria','pieza','produccion','costounitario','avaluo','entrego','fechadev','calidad','recibio','fecharegistro','observaciones');
}

}

