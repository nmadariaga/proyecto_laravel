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
        @foreach($datos as $dato)
        <tbody>
            <tr>
                <td>{{HTML::link("articulos/publicacion/".$dato->id,$dato->tipo_documento)}}</td>
                <td>{{HTML::link("articulos/editar/" . $dato->id, 'Actualizar',array('class' =>'btn btn-primary'))}}</td>
                <td>{{HTML::link('articulos/confirmar/' . $dato->id,'Eliminar',array('class' =>'btn btn-primary'))}}</td>
            </tr>
        </tbody>
        @endforeach
   
    </table>
    <ul class="pagination">
       {{$datos->links()}} 
    </ul>
                                   
    </br>
</div>
@else
<p class="alert alert-danger" role="alert">
    <strong>Su busqueda no arrojo Resultados.</strong> 

</p>
@endif

<h3><a href="{{ URL::to('articulos/busqueda') }}">Volver atrás</a></h3>
@stop






