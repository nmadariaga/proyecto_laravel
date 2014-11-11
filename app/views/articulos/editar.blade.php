@extends('layouts.master')

@section('contenido')

{{Form::open(array('method'=>'post_editar','url'=>'/articulos/editar/',"name"=>"form", 'files' => true))}}

<h2>Actualizar Publicación</h2>

<p>
    Tipo de Registro: </br>     {{Form::text("tipo_documento",$datos['tipo_documento'],array('class' =>'form-control','required autofocus'))}} 
</p>
@if($errors->has('tipo_registro'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('tipo_registro') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach


</p>
@endif
<p>
    Procedencia: </br>       {{Form::text("procedencia",$datos['procedencia'],array('class' =>'form-control','required autofocus'))}} 
</p>
<p>
    Materia: </br>          {{Form::text("materia",$datos['materia'],array('class' =>'form-control','required autofocus'))}} 
</p>


@if($errors->has('materia'))
<p class="alert alert-danger" role="alert">
    @foreach($errors->get('materia') as $error )
    <strong>{{ $error }}</strong> </br>
    @endforeach

</p>
@endif
{{Form::hidden('id',$datos['id'])}}
{{ Form::submit('Actualizar',array('class' =>'btn btn-lg btn-primary btn-block')) }}
<h3><a href="{{ URL::to('inicio') }}">Volver atrás</a></h3> 
@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('mensaje')}}</strong> 
    @endif

</div>


{{Form::close()}}

<br></br>

@stop


