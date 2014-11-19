@extends('layouts.master')
@section('contenido')

<h3>Desea Inhabilitar el Usuario?</h3>

        
 <div class="list-group">
        <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">Usuario</h4>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Nombres</h4>
            <p class="list-group-item-text">{{$registros->nombres}}</p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Apellidos </h4>
            <p class="list-group-item-text">{{$registros->apellidos}}</p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">E-Mail</h4>
            <p class="list-group-item-text">{{$registros->email}}</p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Unidad</h4>
            <p class="list-group-item-text">{{$registros->departamento_fk}}</p>
        </a>
    </div>
             <td>{{HTML::link("test/usuarios", 'Cancelar',array('class' =>'btn btn-primary btn-lg'))}}</td>
                <td>{{HTML::link('test/inhabilitar/' . $registros->id,'Eliminar',array('class' =>'btn btn-danger btn-lg '))}}</td> 

@stop






