<?php

class Artesano extends Eloquent {
public $timestamps = false;
protected $table = 'artesanos';
protected $fillable = array('RFC', 'estadocivil', 'fecharegistro', 'ine', 'taller', 'persona_id');

public function persona(){
return $this->belongsTo('Persona');
}
public function organizacion(){
return $this->belongsToMany('Organizacion');
}
public function comite(){
return $this->belongsToMany('Comite')->withPivot('cargo');
}

public function Productos(){
return $this->hasMany('Producto');
}

public function Concursos(){
return $this->belongsToMany('Concurso')->withPivot('premio','numregistro','categoria','pieza','produccion','costounitario','avaluo','entrego','fechadev','calidad','recibio','fecharegistro', 'observaciones');
}
public function Talleres(){
return $this->belongsToMany('Taller');
}
public function Ferias(){
return $this->belongsToMany('Feria');
}
public function comprasyventas(){
return $this->belongsToMany('Comprasyventa');
}
public function telefono(){
return $this->hasMany('Telefono');
}


}



