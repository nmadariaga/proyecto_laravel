@extends('layouts.admin')

@section('contenido')


<h2 class="form-signin-heading">Editar Datos</h2>
{{ Form::open(array('method'=>'post','url' => 'admin/editaradmin','class'=>'form-horizontal','name'=>'form1','files' => true)) }}


<div class="form-group">
    <label for="exampleInput" class="col-sm-2 control-label">Editar Nombres</label>
    <div class="col-sm-10">
        {{ Form::text('nombres',$datos['nombres'],array('class' =>'form-control','required autofocus') )}}
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
    <label for="exampleInput" class="col-sm-2 control-label">Editar Apellidos</label>
    <div class="col-sm-10">
        {{ Form::text('apellidos',$datos['apellidos'],array('class' =>'form-control', 'placeholder'=>'Apellidos','required autofocus') )}}
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
<div class="form-group">
    <label for="exampleInput" class="col-sm-2 control-label">Editar su E-Mail</label>
    <div class="col-sm-10">
        {{ Form::text('email',$datos['email'],array('class' =>'form-control', 'placeholder'=>'ejemplo@ejemplo.cl','required autofocus') )}}
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

{{Form::hidden('id',$datos['id'])}}
{{ Form::submit('Actualizar',array('class' =>'btn btn-lg btn-primary btn-block','value'=>'Validar RUT')) }}
</br>
@if(Session::has('completo'))
<div class="alert alert-success" role="alert">
    <strong>{{Session::get('completo')}}</strong> 

</div>
@endif
<h3><a href="{{ URL::to('admin/datosadmin') }}">Volver atrás</a></h3> 

{{Form::close()}}

@stop


