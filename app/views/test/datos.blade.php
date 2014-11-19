@extends('layouts.master')
@section('contenido')
@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 

</div>
@endif
<div class="row marketing">
     <div class="list-group">
        <a class="list-group-item active">
            <h4 class="list-group-item-heading">Mi Perfil</h4>
        </a>
        <a  class="list-group-item">
            <h4 class="list-group-item-heading">Nombres</h4>
            <p class="list-group-item-text">{{$perfil->nombres}}</p>
        </a>
        <a class="list-group-item">
            <h4 class="list-group-item-heading">Apellidos </h4>
            <p class="list-group-item-text">{{$perfil->apellidos}}</p>
        </a>
         <a class="list-group-item">
            <h4 class="list-group-item-heading">Rut </h4>
            <p class="list-group-item-text">{{$perfil->rut}}</p>
        </a>
        <a  class="list-group-item">
            <h4 class="list-group-item-heading">E-Mail</h4>
            <p class="list-group-item-text">{{$perfil->email}}</p>
        </a>
        <a  class="list-group-item">
            <h4 class="list-group-item-heading">Departamento</h4>
            <p class="list-group-item-text">{{$dpto->nombre}}</p>
        </a>
    </div>
    
{{HTML::link('test/editar/'.$perfil->id,'Editar mis Datos',array('class' =>'btn btn-primary btn-lg')) }}

<h3><a href="{{ URL::to('inicio') }}">Volver atrás</a></h3> 

{{Form::close()}}
@stop






