@extends('layouts.master')

@section('contenido')
{{ HTML::style('css/blog.css',array('rel' => 'stylesheet')) }}
<div class="blog-masthead">
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{$registros->tipo_registro}}</h2>
            <p class="blog-post-meta"> - Fecha de Ingreso :  {{$registros->fecha}} </br>
                - Registrado por :  <a href="#"></a>{{$registros->autor}}</br>
                - Procedente de :  <a href="#"></a>{{$registros->procedencia}}</p>
            <p>Materia : {{$registros->materia}}</p>
            <hr>
        </div>
        <h3><a href="{{ URL::to('inicio') }}">Salir</a></h3> 
    </div>
</div>
<br></br>

@stop