@extends('layouts.master')

@section('contenido')
{{ HTML::style('css/signin.css') }}

{{ Form::open(array('url' => array('password/contrasena'),'class'=>'form-signin')) }}
<h2 class="form-signin-heading">Cambiar Contraseña</h2>
<div class="form-group">
<label class="control-label">Ingrese Contraseña</label>
{{ Form::password('password_old',array('class' =>'form-control', 'placeholder'=>'Password','required autofocus')) }}
<label class="control-label">Nueva Contraseña</label>
{{ Form::password('contraseña',array('class' =>'form-control', 'placeholder'=>'Password','required autofocus')) }}
<label class="control-label">Repita Contraseña</label>
{{ Form::password('confirmar_contraseña',array('class' =>'form-control', 'placeholder'=>'Password','required autofocus')) }}

{{ Form::submit('Enviar',array('class' =>'btn btn-lg btn-primary btn-block')) }}
@if (Session::has('reset'))
</div>
<div class="alert alert-success" role="success">
    <strong>{{ (Session::get('reset')) }}</strong>
</div>
@endif
@if (Session::has('incorrecta'))
</div>
<div class="alert alert-success" role="success">
    <strong>{{ (Session::get('incorrecta')) }}</strong>
</div>
@endif
@if($errors->has('confirmar_contraseña'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('confirmar_contraseña') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach

</p>
@endif
<h3><a href="{{ URL::to('/') }}">Volver atrás</a></h3>
{{ Form::close() }}


@stop


