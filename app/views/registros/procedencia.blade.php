@extends('layouts.master')

@section('contenido')
        
{{Form::open(array('method'=>'post','url'=>'registros/procedencia',"name"=>"form", 'files' => true))}}

<h2>Ingresar Nueva Procedencia</h2>




<div class="form-group">
  <label class="control-label">Nombre</label>
  {{Form::text("nombre",Input::old('nombre'),array('class' =>'form-control','required autofocus'))}}
</div>
@if($errors->has('nombre'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('nombre') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach

</p>
@endif

<div class="form-group">
  <label class="control-label">Descripción (opcional)</label>
  {{Form::text("descripcion",Input::old('descripcion'),array('class' =>'form-control'))}}
</div>


{{ Form::submit('Ingresar',array('class' =>'btn btn-lg btn-primary btn-block')) }}
<h3><a href="{{ URL::to('registros/add') }}">Volver atrás</a></h3> 
@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 
    @endif

</div>


{{Form::close()}}




@stop




