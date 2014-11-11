@extends('layouts.master')

@section('contenido')

<h2>Resultados busqueda</h2>
@if(count($datos)>0)
<div class="panel panel-primary">
    <div class="panel-heading">Mis Registros </div>
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
                <td>{{HTML::link('articulos/delete/' . $dato->id,'Eliminar',array('class' =>'btn btn-primary'))}}</td>
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

<br></br>
<h3><a href="{{ URL::to('inicio') }}">Volver atrás</a></h3> 

@stop