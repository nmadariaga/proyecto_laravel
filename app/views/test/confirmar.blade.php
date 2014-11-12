@extends('layouts.master')
@section('contenido')

<h3>Desea eliminar el registro?</h3>

        
 <div class="list-group">
        <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">Registro</h4>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Tipo de Documento</h4>
            <p class="list-group-item-text">{{$registros->tipo_documento}}</p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Procedencia </h4>
            <p class="list-group-item-text">{{$registros->procedencia}}</p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Materia</h4>
            <p class="list-group-item-text">{{$registros->materia}}</p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Fecha de Ingreso</h4>
            <p class="list-group-item-text">{{$registros->fecha}}</p>
        </a>
    </div>
             <td>{{HTML::link("inicio", 'Cancelar',array('class' =>'btn btn-primary btn-lg'))}}</td>
                <td>{{HTML::link('articulos/delete/' . $registros->id,'Eliminar',array('class' =>'btn btn-danger btn-lg '))}}</td> 
<br></br>

@stop






