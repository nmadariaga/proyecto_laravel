@extends('layouts.master')

@section('contenido')

    <div class="list-group">
        <a class="list-group-item active">
            <h4 class="list-group-item-heading">Registro</h4>
        </a>
        <a class="list-group-item">
            <h4 class="list-group-item-heading">Tipo de Documento</h4>
            <p class="list-group-item-text">{{$registros->tipo_documento}}</p>
        </a>
        <a  class="list-group-item">
            <h4 class="list-group-item-heading">Procedencia </h4>
            <p class="list-group-item-text">{{$registros->procedencia}}</p>
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
<h3><a href="{{ URL::to('inicio') }}">Volver atrás</a></h3>
<br></br>

@stop