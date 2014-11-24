@extends('layouts.inicio')

@section('contenido')

<div class="jumbotron">
    

    <h2>Administración de Correspondencia</h2>
    <p class="lead"></p>
    {{HTML::link('home/ingreso/','Ingrese a su Cuenta',array('class' =>'btn btn-success')) }}
</div>
@if(Session::has('salir'))
    <div class="alert alert-success" role="alert">
        <strong>{{Session::get('salir')}}</strong> 

    </div>
    @endif

@stop