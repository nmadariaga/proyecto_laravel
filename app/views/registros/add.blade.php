@extends('layouts.master')

@section('contenido')
        
{{Form::open(array('method'=>'post','url'=>'registros/add',"name"=>"form", 'files' => true))}}
@if(Session::has('nuevo'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('nuevo')}}</strong> 
    

</div>
@endif
<h2>Ingreso de Registros</h2>

<div class="form-group">
  <label class="control-label">Tipo de Documento</label>
  {{Form::select("nombre",TipoDoc::lists('nombre', 'id'),Input::old('nombre'),array('class' =>'form-control','required autofocus'))}} 
</div>
<div class="form-group">
    <td>{{HTML::link("registros/documento/", 'Agregar Nuevo',array('class' =>'btn btn-sm btn-primary'))}}</td>
</div>
<div class="form-group">
  <label class="control-label">N° Documento</label>
  {{Form::text("numero",Input::old('numero'),array('class' =>'form-control','required autofocus'))}}
</div>
@if($errors->has('numero'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('numero') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach

</p>
@endif
<div class="form-group">
  <label class="control-label">Procedencia</label>
  {{Form::select("procedencia",Procedencia::lists('nombre', 'id'),Input::old('procedencia'),array('class' =>'form-control','required autofocus'))}}
</div>
<div class="form-group">
    <td>{{HTML::link("registros/procedencia/", 'Agregar Nuevo',array('class' =>'btn btn-sm btn-primary'))}}</td>
</div>
<div class="form-group">
  <label class="control-label">Materia</label>
  {{Form::text("materia",Input::old('materia'),array('class' =>'form-control','required autofocus'))}}
</div>
@if($errors->has('materia'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('materia') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach

</p>
@endif
<div class="form-group">
  <label class="control-label">Observaciones</label>
  {{Form::text("observaciones",Input::old('observaciones'),array('class' =>'form-control','required autofocus'))}}
</div>
@if($errors->has('observaciones'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('observaciones') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach

</p>

@endif

<div class="form-group">
  <label class="control-label">Fecha Recepción de Documento (Opcional)</label>
  <input type="text" name="fecha" id="datepicker"  size="15" class ="form-control autofocus" />
</div>


@if($errors->has('observaciones'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('observaciones') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach

</p>
@endif

{{Form::hidden('autor',$autor['nombres'])}}
{{Form::hidden('rut',$perfil['rut'])}}
{{ Form::submit('Registrar',array('class' =>'btn btn-lg btn-primary btn-block')) }}
<h3><a href="{{ URL::to('inicio') }}">Volver atrás</a></h3> 
@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 
    

</div>
@endif


{{Form::close()}}




@stop




