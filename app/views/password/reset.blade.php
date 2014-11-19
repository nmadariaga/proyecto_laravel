@extends('layouts.inicio')

@section('contenido')
{{ HTML::style('css/signin.css') }}

{{ Form::open(array('url' => array('password/reset', $token),'class'=>'form-signin')) }}
<h2 class="form-signin-heading">Reestablecer Contraseña</h2>
<div class="form-group">

    <label class="control-label">Ingrese su E-Mail</label>
    {{ Form::text('email',Input::old('tipo_documento'),array('class' =>'form-control','placeholder'=>'E-Mail','required autofocus')) }}</p>
@if($errors->has('email'))
<div class="alert alert-danger" role="alert">
    @foreach($errors->get('email') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach
</div>
@endif
<label class="control-label">Nueva Contraseña</label>
{{ Form::password('password',array('class' =>'form-control', 'placeholder'=>'Password','required autofocus')) }}
<label class="control-label">Repita Contraseña</label>
{{ Form::password('password_confirmation',array('class' =>'form-control', 'placeholder'=>'Password','required autofocus')) }}

{{ Form::hidden('token', $token) }}
{{ Form::submit('Enviar',array('class' =>'btn btn-lg btn-primary btn-block')) }}
@if (Session::has('error'))
</div>
<div class="alert alert-success" role="success">
    <strong>{{ (Session::get('error')) }}</strong>
</div>
@endif
<h3><a href="{{ URL::to('/home/ingreso') }}">Volver atrás</a></h3>
{{ Form::close() }}


@stop


