@extends('layouts.master')
@section('contenido')
@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 

</div>
@endif
@if(count($datos)>0)
<h2>Resultados busqueda</h2>
<div class="panel panel-primary">
    <div class="panel-heading">Registros </div>
    <table class="table table-striped">
        <thead>
            <tr>

                <th>Tipo de Documento</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        @foreach($tipos as $tipo)
        @foreach($datos as $dato)
         @if($tipo->id ==$dato->tipo_documento_fk)
        <tbody>
            <tr>
                <td>{{HTML::link("registros/publicacion/".$dato->id,$tipo->nombre)}}</td>
                <td>{{HTML::link("registros/editar/" . $dato->id, 'Actualizar',array('class' =>'btn btn-primary'))}}</td>
                <td>{{HTML::link('registros/confirmar/' . $dato->id,'Eliminar',array('class' =>'btn btn-primary'))}}</td>
            </tr>
        </tbody>
        @endif
        @endforeach
    @endforeach
    </table>
    <ul class="pagination">
       {{$datos->links()}} 
    </ul>
                                   
</div>
@else
<p class="alert alert-danger" role="alert">
    <strong>Su busqueda no arrojo Resultados.</strong> 

</p>
@endif

<h3><a href="{{ URL::to('registros/busqueda') }}">Volver atrás</a></h3>
@stop






