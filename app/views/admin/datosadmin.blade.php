@extends('layouts.admin')
@section('contenido')
@if(Session::has('completo'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('completo')}}</strong> 

</div>
@endif
<div class="row marketing">
      @foreach($perfil2 as $perfil)
     <div class="list-group">
        <a  class="list-group-item active">
            <h4 class="list-group-item-heading">Mi Perfil</h4>
        </a>
        <a  class="list-group-item">
            <h4 class="list-group-item-heading">Nombres</h4>
            <p class="list-group-item-text">{{$perfil->nombres}}</p>
        </a>
        <a  class="list-group-item">
            <h4 class="list-group-item-heading">Apellidos </h4>
            <p class="list-group-item-text">{{$perfil->apellidos}}</p>
        </a>
         <a  class="list-group-item">
            <h4 class="list-group-item-heading">Rut </h4>
            <p class="list-group-item-text">{{$perfil->rut}}</p>
        </a>
        <a  class="list-group-item">
            <h4 class="list-group-item-heading">E-Mail</h4>
            <p class="list-group-item-text">{{$perfil->email}}</p>
        </a>
        <a  class="list-group-item">
            <h4 class="list-group-item-heading">Lugar de Trabajo</h4>
            <p class="list-group-item-text">{{$perfil->departamento}}</p>
        </a>
    </div>
    
   @endforeach  
    
     
    {{HTML::link('admin/editaradmin/'.$perfil->id,'Editar mis Datos',array('class' =>'btn btn-primary btn-lg')) }}

</div>

<h3><a href="{{ URL::to('inicio2') }}">Volver atrás</a></h3> 

{{Form::close()}}
@stop






