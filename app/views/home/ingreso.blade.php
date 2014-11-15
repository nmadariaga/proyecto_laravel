@extends('layouts.inicio')

@section('contenido')

<head>
    <title>Proyecto Laravel</title>

    
    {{ HTML::script('js/validarut.js') }}
</head>

{{ HTML::style('css/signin.css') }}
{{ Form::open(array('url' =>'login','class'=>'form-signin','name'=>'form1','onSubmit'=>"javascript:return Rut(document.form1.rut.value)")) }}
<h2 class="form-signin-heading">Ingrese a su Cuenta</h2>

<!--div class="form-group">
    {{ Form::select('rol', Roles::lists('rol', 'id'),Input::old('id'),array('class' =>'form-control'))}}
</div-->

<div class="form-group">
    {{ Form::text('rut',Input::old('rut'),array('class' =>'form-control', 'placeholder'=>'Rut','required autofocus','name'=>'rut') )}}
</div>

<div class="form-group">
    {{ Form::password('contrasena',array('class' =>'form-control', 'placeholder'=>'Password','required autofocus')) }}
</div>

@if(Session::has('mensaje'))
<div class="alert alert-danger" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 
</div>
@endif
 @if(Session::has('reset'))
<div class="alert alert-danger" role="alert">
    <strong>{{Session::get('reset')}}</strong> 
</div>
@endif   
{{ Form::submit('ingresar',array('class' =>'btn btn-lg btn-primary btn-block','value'=>'Validar RUT')) }}
        

<div class="form-group">
    <h4 class="form-signin-heading">Olvido su contraseña?  {{ HTML::link('password/remind','Recordar')}}</h4>
    <h3><a href="{{ URL::to('/') }}">Volver atrás</a></h3> 
</div> 
{{ Form::close() }}


<br></br>


@stop
