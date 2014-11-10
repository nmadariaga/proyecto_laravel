<?php

class Registros extends Eloquent
{
    protected $table = 'registros';
    protected $fillable = array('fecha','autor','rut','tipo_registro','materia','procedencia');
    public $timestamps=false;
    
    public function TipoRegistros(){
        return $this->belongsTo('tipo_registros');
    }
    
}

