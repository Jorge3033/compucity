@extends('layouts.upFormsAdmin')

@section('tableName')
  Admin  
@stop

@section('form') 
	<h4 class="modal-title"><img src="{{ asset('photos/'.$consulta->photo) }}" width="50" height="50"> Modificar Admin </h4>
	
	{{ Form::open(['route'=>'modifyAdmin','files'=>true]) }}
    {{ Form::token() }}
	
	<div class="form-group">
	<label >Id</label>
	<input type="id" readonly value="{{ $consulta->id }}" class="form-control" name="id">
		
	</div>

	<div class="form-group">
		<label> Nombre</label>
		@if($errors->first('nombre'))
			<p class="alert alert-danger"> {{$errors->first('nombre')}}</p>	
 		@endif 
		{{ Form::text('nombre',  $consulta->name , ['class'=>'form-control']) }}
	</div>

	<div class="form-group">
		<label> Apellidos</label>
		@if($errors->first('apellidos'))
			<p class="alert alert-danger"> {{$errors->first('apellidos')}}</p>
 		@endif 
		{{ Form::text('apellidos', $consulta->lastName, ['class'=>'form-control']) }}
	</div>

	<div class="form-group">
		<label> Correo</label>
		@if($errors->first('correo'))
			<p class="alert alert-danger"> {{$errors->first('correo')}}</p>
 		@endif 
		{{ Form::text('correo', $consulta->mail, ['class'=>'form-control']) }}
	</div>

	<div class="form-group">
		<label> Contaseña (Minimo 8 Caracteres)</label>
		@if($errors->first('contrasena'))
			<p class="alert alert-danger"> {{$errors->first('contrasena')}}</p>
 		@endif 
		{{ Form::text('contrasena',$consulta->password, ['class'=>'form-control']) }}
	</div>
	
	<div class="form-control border-0" >
		<label >Foto</label>
		@if($errors->first('foto'))
			<p class="alert alert-danger"> {{$errors->first('foto')}}</p>
 		@endif
		{{ Form::file('foto', ['class'=>'form-control border-0']) }}
	</div>

	<div class="form-group">
		<label >estado</label>
		<select name="estado" class="form-control">
		<option value="activo" >Activo</option>
	</select>
	</div>


	<a href="#" class="btn btn-danger">Cancelar</a>
	{{ Form::submit('Modificar', ['class'=>'btn btn-warning']) }}
	{{ Form::close() }}
@stop 