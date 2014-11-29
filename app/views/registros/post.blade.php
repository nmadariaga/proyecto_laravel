@extends('layouts.master')

@section('contenido')
<h2 class="form-signin-heading">Registro</h2>
<div class="panel panel-primary">
    
     <div class="list-group">
        <a class="list-group-item active">
            <h4 class="list-group-item-heading">Datos</h4>
        </a>
        <a class="list-group-item">
            <h4 class="list-group-item-heading">Tipo de Documento</h4>
            <p class="list-group-item-text">{{$doc->nombre}}</p>
        </a>
        <a  class="list-group-item">
            <h4 class="list-group-item-heading">Procedencia </h4>
            <p class="list-group-item-text">{{$proc->nombre}}</p>
        </a>
        <a  class="list-group-item">
            <h4 class="list-group-item-heading">Materia</h4>
            <p class="list-group-item-text">{{$registros->materia}}</p>
        </a>
        <a  class="list-group-item">
            <h4 class="list-group-item-heading">Fecha de Ingreso</h4>
            <p class="list-group-item-text">{{$registros->fecha}}</p>
        </a>
    </div>
    
</div>
   
<h3><a href="{{ URL::to('registros/registros') }}">Volver atrás</a></h3>
@stop