@extends('layouts.master')

@section('contenido')

<div>
        <h2>Buscar por Filtro</h2>
        
        {{Form::open(array('method'=>'get','url'=>'/registros/filtros',"name"=>"navbar-form navbar-left", 'role' => 'search'))}}
        <div class="form-group">
            <label class="control-label">Tipo de Documento</label>
            {{Form::select("tipo_documento",TipoDoc::lists('nombre','id'),Input::old('tipo_documento'),array('class' =>'form-control','required autofocus'))}}
        </div>
        <div class="form-group">
            <label class="control-label">Procedencia</label>
        {{Form::select("procedencia",Procedencia::lists('nombre','id'),Input::old('procedencia'),array('class' =>'form-control','required autofocus'))}} 
        </div>
        
        {{ Form::submit("Buscar",array('class'=>'btn btn-primary')) }}</br>
        {{ Form::close() }}


    </div> 

    <div>
        <h2>Buscar por materia</h2>
        
       
        {{Form::open(array('method'=>'get','url'=>'/registros/resultados',"name"=>"navbar-form navbar-left", 'role' => 'search'))}}
        <div class="form-group">
            {{ Form::text('buscar',Input::old('buscar'),array('class'=>'form-control','placeholder'=>'Ingrese su Busqueda', 'required')) }}
        
        </div> 
        {{ Form::submit("Buscar",array('class'=>'btn btn-primary')) }}</br>
        {{ Form::close() }}


    </div> 
        {{Form::open(array('method'=>'get','url'=>'/registros/resultadofecha',"name"=>"navbar-form navbar-left", 'role' => 'search'))}}

    <div class="form-group">
        <h2>Buscar por Fecha</h2>
  <label class="control-label">Fecha</label>
  <input type="text" name="fecha" id="datepicker"  size="15" class ="form-control autofocus" placeholder="Fecha"/>
  
</div>
{{ Form::submit("Buscar",array('class'=>'btn btn-primary')) }}
    
  {{ Form::close() }}
<h3><a href="{{ URL::to('inicio') }}">Volver atrás</a></h3>

 

@stop