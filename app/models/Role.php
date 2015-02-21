<?php

class Role extends Eloquent {
public $timestamps = false;
protected $table = 'roles';
protected $fillable = array('id','nombre');

public function Users(){
	return $this->hasMany('User');
}

}
