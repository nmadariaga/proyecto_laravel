@extends('layouts.master')
@section('contenido')
{{ HTML::script('js/admin.js') }}
@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 

</div>
@endif
@if(Session::has('borrar'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('borrar')}}</strong> 

</div>
@endif
<div class="jumbotron">
    @foreach($perfil as $nombre)
    <h2>Bienvenido {{$nombre->nombres}}</h2>
    <p class="lead"></p>
    @endforeach
    {{HTML::link('test/datos/'.$rut,'Mis Datos',array('class' =>'btn btn-success')) }}
</div>
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
                <td>{{HTML::link('articulos/confirmar/' . $dato->id,'Eliminar',array('class' =>'btn btn-primary '))}}</td>
            </tr>
        </tbody>
        @endforeach

    </table>
    {{$datos->links()}}                           
    </br>
</div>

<div class="row marketing">


    {{HTML::link('articulos/add/'.$rut,'Ingresar Registro',array('class' =>'btn btn-primary btn-lg')) }}

    <div>
        <h2>Buscar Registros</h2>
        {{Form::open(array('method'=>'get','url'=>'/articulos/busqueda',"name"=>"navbar-form navbar-left", 'role' => 'search'))}}
        {{ Form::text('buscar',Input::old('buscar'),array('class'=>'form-control','placeholder'=>'Ingrese su Busqueda', 'required')) }}
        {{ Form::submit("Buscar",array('class'=>'btn btn-default')) }}</br>
        {{ Form::close() }}


    </div> 

</div>


<br></br>
{{Form::close()}}
@stop






