@extends('layouts.master')
@section('contenido')

<div class="row marketing">
    <div class="panel panel-primary">
        <div class="panel-heading">Mi Perfil</div>
        <ul class="list-group">
            @foreach($perfil2 as $perfil)
            <li class="list-group-item"><b>Nombres:</b>    {{$perfil->nombres}}</li> 
            <li class="list-group-item"><b>Apellidos:</b>  {{$perfil->apellidos}}</li>
            <li class="list-group-item"><b>Rut: </b>       {{$perfil->rut}}</li>
            <li class="list-group-item"><b>E-mail:</b>  <a>{{$perfil->email}}</a></address></li>
            <!--li class="list-group-item">Departamento:<a>{{$perfil->departamento}}</a></address></li-->
            </br
            @endforeach
        </ul>
        
        
    </div>
    
     
    {{HTML::link('test/editaradmin/'.$perfil->id,'Editar mis Datos',array('class' =>'btn btn-primary btn-lg')) }}


</div>

<h3><a href="{{ URL::to('inicio2') }}">Volver atrás</a></h3> 

<br></br>
{{Form::close()}}
@stop






