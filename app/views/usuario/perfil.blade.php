@extends('layouts.master')
@section('contenido')
{{ HTML::script('js/admin.js') }}

<div class="jumbotron">
    @foreach($perfil as $nombre)
    <h2>Bienvenido {{$nombre->nombres}}</h2>
    <p class="lead"></p>
    @endforeach
    {{HTML::link('usuario/datos/'.$nombre->id,'Mis Datos',array('class' =>'btn btn-success')) }}
</div>
@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 

</div>
@endif
@if(Session::has('borrar'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('borrar')}}</strong> 

</div>
@endif



{{Form::close()}}
@stop






