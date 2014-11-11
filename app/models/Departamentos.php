<?php


class Departamentos extends Eloquent
{
    protected $table = 'departamentos';
    //protected $fillable = array('facultad','nombre','descripcion');
    public $timestamps=false;
    
    public function Funcionarios() {
        return $this->hasMany('Funcionarios', 'departamento_fk');
    }
    
    
}

