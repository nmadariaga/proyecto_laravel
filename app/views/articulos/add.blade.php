@extends('layouts.master')

@section('contenido')


{{Form::open(array('method'=>'post','url'=>'articulos/add',"name"=>"form", 'files' => true))}}

<h2>Ingreso de Registros</h2>

<p>
    Tipo de Registro: </br>     {{Form::text("tipo_registro",Input::old('numero_registro'),array('class' =>'form-control','required autofocus'))}} 
</p>
<p>
    Procedencia: </br>       {{Form::text("procedencia",Input::old('procedencia'),array('class' =>'form-control','required autofocus'))}} 
</p>
<p>
    Materia: </br>          {{Form::text("materia",Input::old('procedencia'),array('class' =>'form-control','required autofocus'))}} 
</p>
@if($errors->has('numero_registro'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('numero_registro') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach


</p>
@endif

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



<br></br>


@stop




