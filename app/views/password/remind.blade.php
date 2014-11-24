@extends('layouts.inicio')

@section('contenido')
{{ HTML::style('css/signin.css') }}

{{ Form::open(array('url' => 'password/remind','class'=>'form-signin')) }}

<div class="form-group">
    <h2 class="form-signin-heading">Recordar Contraseña</h2>

    <label class="control-label">Ingrese su E-Mail</label>
    {{ Form::text('email',Input::old('tipo_documento'),array('class' =>'form-control','required autofocus')) }}</p>
@if($errors->has('email'))
<div class="alert alert-danger" role="alert">
    @foreach($errors->get('email') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach


</div>
@endif
{{ Form::submit('Enviar',array('class' =>'btn btn-lg btn-primary btn-block')) }}
@if (Session::has('success'))

<div class="alert alert-success" role="success">
    <strong>{{ (Session::get('success')) }}</strong>
</div>
@endif
<h3><a href="{{ URL::to('/home/ingreso') }}">Volver atrás</a></h3>

</div>

{{ Form::close() }}



@stop


