<?php

class Registros extends Eloquent
{
    protected $table = 'registros';
    //protected $fillable = array('fecha','autor','rut','tipo_registro','materia','procedencia');
    public $timestamps=false;
    
     public function TipoDoc() {
        return $this->HasOne('TipoDoc', 'tipo_documento_fk');
    }
    public function Procedencia() {
        return $this->HasOne('Procedencia', 'procedencia_fk');
    }
   
    
}

