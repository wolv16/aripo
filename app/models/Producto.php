<?php

class Producto extends Eloquent {
public $timestamps = false;
protected $table = 'productos';
protected $fillable = array('nombre', 'produccionmensual', 'costoaprox', 'artesano_id');


public function organizacion(){
return $this->belongsTo('Artesano');
}
}

