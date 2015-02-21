<?php

class Persona extends Eloquent {
public $timestamps = false;
protected $table = 'personas';
protected $fillable = array('nombre','paterno','materno', 'curp', 'sexo', 'cuis', 'observaciones', 'fechanacimiento', 'grupoetnico_id', 'localidad_id', 'rama_id');

public function Artesano(){
return $this->hasOne('Artesano');
}
public function Documentos(){
return $this->hasMany('Documento');
}
public function Grupoetnico(){
return $this->belongsTo('Gruposetnico');
}
public function Localidad(){
return $this->belongsTo('Localidad');
}
public function Rama(){
return $this->belongsTo('Rama');
}
public function Concursos(){
return $this->belongsToMany('Concurso')->withPivot('premio','numregistro','categoria','pieza','produccion','costounitario','avaluo','entrego','fechadev','calidad','recibio','fecharegistro','observaciones');
}
public function Direccion(){
return $this->hasOne('Direccion');
}
public function Telefono(){
return $this->hasOne('Telefono');
}
}
