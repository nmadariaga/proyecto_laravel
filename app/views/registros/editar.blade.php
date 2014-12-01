@extends('layouts.master')

@section('contenido')

{{Form::open(array('method'=>'post_editar','url'=>'/registros/editar/',"name"=>"form", 'files' => true))}}

<h2>Editar Registro</h2>

<div class="form-group">
  <label class="control-label">Tipo de Documento</label>
  {{Form::select("tipo_documento",TipoDoc::lists('nombre','id'),Input::old('tipo_documento'),array('class' =>'form-control','required autofocus'))}} 
</div>
@if($errors->has('tipo_documento'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('tipo_documento') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach


</p>
@endif
<div class="form-group">
  <label class="control-label">N° de Documento</label>
  {{Form::text("numero_registro",$datos['numero_registro'],array('class' =>'form-control','required autofocus'))}}
</div>
@if($errors->has('materia'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('materia') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach

</p>
@endif
<div class="form-group">
  <label class="control-label">Procedencia</label>
  {{Form::select("procedencia",Procedencia::lists('nombre','id'),Input::old('procedencia'),array('class' =>'form-control','required autofocus'))}}
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
  {{Form::text("materia",$datos['materia'],array('class' =>'form-control','required autofocus'))}}
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
  {{Form::text("observaciones",$datos['observaciones'],array('class' =>'form-control','required autofocus'))}}
</div>
@if($errors->has('observaciones'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('observaciones') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach

</p>
@endif
{{Form::hidden('id',$datos['id'])}}
{{ Form::submit('Editar',array('class' =>'btn btn-lg btn-primary btn-block')) }}
<h3><a href="{{ URL::to('inicio') }}">Volver atrás</a></h3> 
@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 
    @endif

</div>


{{Form::close()}}

<br></br>

@stop


