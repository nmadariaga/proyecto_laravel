@extends('layouts.master')

@section('contenido')

<h2>Resultados busqueda</h2>
@if(count($datos)>0)
@foreach($datos as $dato)
<h3>{{HTML::link("articulos/publicacion/".$dato->id,$dato->tipo_registro)}}</a></h3>
<p>{{$dato->observaciones}}</p>
@endforeach
@else
<p class="alert alert-danger" role="alert">
    <strong>Su busqueda no arrojo Resultados.</strong> 

</p>
@endif

<br></br>
<h3><a href="{{ URL::to('inicio') }}">Volver atrás</a></h3> 

@stop