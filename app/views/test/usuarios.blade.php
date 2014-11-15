@extends('layouts.master')

@section('contenido')

<h2>Lista de Usuarios</h2>

<div class="panel panel-primary">
    <div class="panel-heading">Usuarios </div>
    <table class="table table-striped">
        <thead>
            <tr>

                <th>Nombres</th>
                <th>Apellidos</th>
                <th>E-Mail</th>
                <th>Unidad</th>
            </tr>
        </thead>
        @foreach($datos as $dato)
        <tbody>
            <tr>
                <td>{{$dato->nombres}}</td>
                <td>{{$dato->apellidos}}</td>
                <td>{{$dato->email}}</td>
                <td>{{$dpto->nombre}}</td>
            </tr>
        </tbody>
        @endforeach
   
    </table>
                                   
    </br>
</div>


<br></br>
<h3><a href="{{ URL::to('inicio2') }}">Volver atrás</a></h3> 

@stop