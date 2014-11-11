<?php

class TipoRegistros extends Eloquent
{
    protected $table = 'tipo_registros';
    //protected $fillable = array('nombre','descripcion');
    public $timestamps=false;
    
    public function Registros() {
        return $this->hasMany('Registros', 'tipo_fk');
    }
    
    
}

