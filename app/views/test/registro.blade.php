@extends('layouts.admin')

@section('contenido')
{{ HTML::script('js/validarut.js') }}


<h2 class="form-signin-heading">Ingresar Datos</h2>
{{ Form::open(array('method'=>'post','url' => 'test/registro','class'=>'form-horizontal','name'=>'form1','onSubmit'=>"javascript:return Rut(document.form1.rut.value)")) }}
<div class="form-group" >
    <label for="formGroupInputLarge" class="col-sm-2 control-label">Tipo de Usuario</label>
    <div class="col-sm-10">
        {{Form::select('rol', Roles::lists('rol', 'id'),Input::old('rol'),array('class' =>'form-control','required autofocus'))}}
    </div>
</div>
<div class="form-group">
    <label for="exampleInput" class="col-sm-2 control-label">Ingrese su Rut</label>
    <div class="col-sm-10">
        {{ Form::text('rut',Input::old('rut'),array('class' =>'form-control', 'placeholder'=>'Rut','name'=>'rut') )}}
    </div>
    <div class="col-sm-10">
        @if($errors->has('rut'))
        <div class="alert alert-danger" role="alert">
            @foreach($errors->get('rut') as $error )
            <strong>{{ $error }}</strong> </br>
            @endforeach
        </div>
        @endif
    </div>

</div>
<div class="form-group">
    <label for="exampleInput" class="col-sm-2 control-label">Elija su Contraseña</label>
    <div class="col-sm-10">
        {{ Form::password('contrasena',array('class' =>'form-control', 'placeholder'=>'Contraseña','required autofocus')) }}
    </div>
    <div class="col-sm-10">
        @if($errors->has('contrasena'))
        <div class="alert alert-danger" role="alert">
            @foreach($errors->get('contrasena') as $error )
            <strong>{{ $error }}</strong> </br>
            @endforeach
        </div>
        @endif


    </div>

</div>
<div class="form-group">
    <label for="exampleInput" class="col-sm-2 control-label">Confirme su Contraseña</label>
    <div class="col-sm-10">
        {{ Form::password('contrasena_confirmation',array('class' =>'form-control', 'placeholder'=>'Contraseña','required autofocus')) }}
    </div>
    <div class="col-sm-10">
        @if($errors->has('contrasena_confirmation'))
        <div class="alert alert-danger" role="alert">
            @foreach($errors->get('contrasena_confirmation') as $error )
            <strong>{{ $error }}</strong> </br>
            @endforeach
        </div>
        @endif


    </div>

</div>

<div class="form-group">
    <label for="exampleInput" class="col-sm-2 control-label">Ingrese sus Nombres</label>
    <div class="col-sm-10">
        {{ Form::text('nombres',Input::old('nombres'),array('class' =>'form-control', 'placeholder'=>'Nombres','required autofocus') )}}
    </div>
    <div class="col-sm-10">
        @if($errors->has('nombres'))
        <div class="alert alert-danger" role="alert">
            @foreach($errors->get('nombres') as $error )
            <strong>{{ $error }}</strong> </br>
            @endforeach
        </div>
        @endif

    </div>
</div>
<div class="form-group">
    <label for="exampleInput" class="col-sm-2 control-label">Ingrese sus Apellidos</label>
    <div class="col-sm-10">
        {{ Form::text('apellidos',Input::old('apellidos'),array('class' =>'form-control', 'placeholder'=>'Apellidos','required autofocus') )}}
    </div>
    <div class="col-sm-10">
        @if($errors->has('apellidos'))
        <div class="alert alert-danger" role="alert">
            @foreach($errors->get('apellidos') as $error )
            <strong>{{ $error }}</strong> </br>
            @endforeach
        </div>
        @endif

    </div>
</div>
<div class="form-group" >
    <label for="formGroupInputLarge" class="col-sm-2 control-label">Genero</label>
    <div class="col-sm-10">
        {{Form::select('genero',array(1 => 'Masculino', 2 => 'Femenino'),Input::old('rol'),array('class' =>'form-control'))}}   
    </div>


</div>
<div class="form-group">
    <label for="exampleInput" class="col-sm-2 control-label">Ingrese su E-Mail</label>
    <div class="col-sm-10">
        {{ Form::text('email',Input::old('email'),array('class' =>'form-control', 'placeholder'=>'ejemplo@ejemplo.cl','required autofocus') )}}
    </div>
    <div class="col-sm-10">
        @if($errors->has('email'))
        <div class="alert alert-danger" role="alert">
            @foreach($errors->get('email') as $error )
            <strong>{{ $error }}</strong> </br>
            @endforeach
        </div>
        @endif
    </div>
</div>
<div class="form-group" >
    <label for="formGroupInputLarge" class="col-sm-2 control-label">Departamento</label>
    <div class="col-sm-10">
        {{Form::select('departamento', Departamentos::lists('nombre', 'id'),Input::old('rol'),array('class' =>'form-control'))}}
    </div>
</div>

@if(Session::has('completo'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('completo')}}</strong> 

</div>
@endif

{{ Form::submit('Registrar',array('class' =>'btn btn-lg btn-primary btn-block','value'=>'Validar RUT')) }}
<h3><a href="{{ URL::to('inicio2') }}">Volver atrás</a></h3> 
{{Form::close()}}

@stop


