<?php

class TipoDoc extends Eloquent
{
    protected $table = 'tipo_doc';
    //protected $fillable = array('roles','descripcion');
    public $timestamps=false;
    
     public function Registros() {
        return $this->BelongsTo('Registros');
    }
}

