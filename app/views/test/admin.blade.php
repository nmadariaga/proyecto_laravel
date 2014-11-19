@extends('layouts.admin')

@section('contenido')

<div class="jumbotron">
    @foreach($perfil2 as $nombre)
    <h2>Bienvenido {{$nombre->nombres}}</h2>
    <p class="lead"></p>
     @endforeach
     {{HTML::link('test/datosadmin/'.$rut,'Mis Datos',array('class' =>'btn btn-success')) }}
</div>
@if(Session::has('completo'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('completo')}}</strong> 

</div>
@endif

@stop






