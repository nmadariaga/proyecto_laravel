<?php

class Funcionarios extends Eloquent
{
    protected $table = 'funcionarios';
    //protected $fillable = array('nombres','apellidos','rut','genero','email','departamento_fk');
    public $timestamps=false;
    
     public function Departamentos(){
        return $this->belongsTo('Departamentos');
    }
    
    
}

