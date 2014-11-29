<?php

class Procedencia extends Eloquent
{
    protected $table = 'procedencia';
    //protected $fillable = array('roles','descripcion');
    public $timestamps=false;
    
     public function Registros() {
        return $this->BelongsTo('Registros');
    }
}

