@extends('layouts.master')

@section('contenido')



    <div>
        <h2>Buscar Registros</h2>
        {{Form::open(array('method'=>'post','url'=>'/articulos/resultados',"name"=>"navbar-form navbar-left", 'role' => 'search'))}}
        {{ Form::text('buscar',Input::old('buscar'),array('class'=>'form-control','placeholder'=>'Ingrese su Busqueda', 'required')) }}
        {{ Form::submit("Buscar",array('class'=>'btn btn-default')) }}</br>
        {{ Form::close() }}


    </div> 

<h3><a href="{{ URL::to('inicio') }}">Volver atrás</a></h3>

 

@stop