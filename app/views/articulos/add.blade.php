@extends('layouts.master')

@section('contenido')

{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js',array('type'=>"text/javascript"))}}
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js',array('type'=>"text/javascript"))}}
{{ HTML::script('js/calendario.js')}}
{{Form::open(array('method'=>'post','url'=>'articulos/add',"name"=>"form", 'files' => true))}}

<h2>Ingreso de Registros</h2>

<div class="form-group">
  <label class="control-label">Tipo de Documento</label>
  {{Form::text("tipo_documento",Input::old('tipo_documento'),array('class' =>'form-control','required autofocus'))}} 
</div>
@if($errors->has('tipo_documento'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('tipo_documento') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach


</p>
@endif
<div class="form-group">
  <label class="control-label">Procedencia</label>
  {{Form::text("procedencia",Input::old('procedencia'),array('class' =>'form-control','required autofocus'))}}
</div>
@if($errors->has('procedencia'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('procedencia') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach

</p>
@endif
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
  <label class="control-label">Fecha de Recepción</label>
  {{Form::text("fecha",Input::old('fecha'),array('name'=>"datepicker",'id'=>"datepicker", 'readonly'=>'readonly', 'size'=>"15"))}}
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
    @endif

</div>


{{Form::close()}}




@stop




