@extends('layouts.master')

@section('contenido')
{{ Form::open(array('url' => 'password/remind')) }}
 
  <p>{{ Form::label('email', 'Email') }}
  {{ Form::text('email') }}</p>
 
  <p>{{ Form::submit('Submit') }}</p>
 
{{ Form::close() }}



<br></br>
@stop


