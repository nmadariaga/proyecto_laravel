@extends('layouts.inicio')

@section('contenido')
@if(Session::has('salir'))
    <div class="alert alert-success" role="alert">
        <strong>{{Session::get('salir')}}</strong> 

    </div>
    @endif
<div class="jumbotron">
    

    <h2>Administración de Correspondencia UTEM</h2>
    <p class="lead"></p>
    {{HTML::link('home/ingreso/','Ingrese a su Cuenta',array('class' =>'btn btn-success')) }}
</div>


@stop