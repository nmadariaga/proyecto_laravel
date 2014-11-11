@extends('layouts.master')
@section('contenido')
@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 

</div>
@endif
<div class="row marketing">
    <div class="panel panel-primary">
        <div class="panel-heading">Mi Perfil</div>
        <ul class="list-group">
            @foreach($perfil as $perfil)
            
            <li class="list-group-item"><b>Nombres:</b>    {{$perfil->nombres}}</li> 
            <li class="list-group-item"><b>Apellidos:</b>  {{$perfil->apellidos}}</li>
            <li class="list-group-item"><b>Rut:</b>        {{$perfil->rut}}</li>
            <li class="list-group-item"><b>E-mail:</b>  <a> {{$perfil->email}} </a></address></li>
            <li class="list-group-item"><b>Departamento:</b>  {{$dpto->nombre}}   <a></a></address></li>  
            @endforeach
            </br> 
        </ul>
        
        
    </div>
    
     
    {{HTML::link('test/editar/'.$perfil->id,'Editar mis Datos',array('class' =>'btn btn-primary btn-lg')) }}


</div>

<h3><a href="{{ URL::to('inicio') }}">Volver atrás</a></h3> 

<br></br>
{{Form::close()}}
@stop






