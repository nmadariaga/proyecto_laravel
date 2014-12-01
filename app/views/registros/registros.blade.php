@extends('layouts.master')
@section('contenido')
@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 

</div>
@endif
<h2 class="form-signin-heading">Mis Registros</h2>
<div class="panel panel-primary">
    <div class="panel-heading">Registros </div>
    <table class="table table-striped">
        <thead>
            <tr>

                <th>Tipo de Documento</th>
                <th>N° de Documento</th>
                <th>Fecha Recepción</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        @foreach($tipo as $tipo)
        @foreach($datos as $dato)
         @if($tipo->id ==$dato->tipo_documento_fk)
        <tbody>
            <tr>
                <td>{{HTML::link("registros/publicacion/".$dato->id,$tipo->nombre)}}</td>
                <td>{{$dato->numero_registro}}</td>
                <td>{{$dato->fecha_recep}}</td>
                <td>{{HTML::link("registros/editar/" . $dato->id, 'Editar',array('class' =>'btn btn-primary'))}}</td>
                <td>{{HTML::link('registros/confirmar/' . $dato->id,'Eliminar',array('class' =>'btn btn-primary '))}}</td>
            </tr>
        </tbody>
        @endif
        @endforeach
        @endforeach
    </table>
    {{$datos->links()}}                           
    </br>
    
</div>
<h3><a href="{{ URL::to('inicio') }}">Volver atrás</a></h3>
@stop






