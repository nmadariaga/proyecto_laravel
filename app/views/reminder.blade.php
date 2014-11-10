@extends('layouts.master')

@section('contenido')
<head>
    <title>Proyecto Laravel</title>

</head>
<div class="text-center">
    <h2>En Construcción...lo sentímos</h2>
</div>


{{ Form::open(array('method'=>'store','url' => 'test/reminder','class'=>'form-signin')) }}

<h2 class="form-signin-heading">Ingrese su E-Mail</h2>

<div class="form-group">
    {{ Form::text('email',Input::old('email'),array('class' =>'form-control', 'placeholder'=>'E-Mail','required autofocus') )}}
</div>

@if(Session::has('mensaje'))
<div class="alert alert-danger" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 
</div>
@endif
@if(Session::has('salir'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('salir')}}</strong> 

</div>
@endif
<!--div>
    {{ Form::submit('Enviar',array('class' =>'btn btn-lg btn-primary btn-block')) }}
</div-->

{{ Form::close() }}


<br></br>
@stop


