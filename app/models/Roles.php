<?php

class Roles extends Eloquent
{
    protected $table = 'roles';
    //protected $fillable = array('roles','descripcion');
    public $timestamps=false;
    
     public function Usuarios() {
        return $this->hasMany('Usuarios', 'rol_fk');
    }
}

