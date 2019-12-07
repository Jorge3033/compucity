@extends('layouts.upFormsAdmin')

@section('tableName')
  Admin 
@stop

@section('form') 
	<h4 class="modal-title"><img src="{{ asset('photos/noPhotoMan.png') }}" width="50" height="50"> Alta Admin </h4>
	
	{{ Form::open(['route'=>'upAdmin','files'=>true]) }}
    {{ Form::token() }}

	<div class="form-group">
		<label> Nombre</label>
		@if($errors->first('nombre'))
			<p class="alert alert-danger"> {{$errors->first('nombre')}}</p>	
 		@endif 
		{{ Form::text('nombre', old('nombre'), ['class'=>'form-control']) }}
	</div>

	<div class="form-group">
		<label> Apellidos</label>
		@if($errors->first('apellidos'))
			<p class="alert alert-danger"> {{$errors->first('apellidos')}}</p>
 		@endif 
		{{ Form::text('apellidos', old('apellidos'), ['class'=>'form-control']) }}
	</div>

	<div class="form-group">
		<label> Correo</label>
		@if($errors->first('correo'))
			<p class="alert alert-danger"> {{$errors->first('correo')}}</p>
 		@endif 
		{{ Form::text('correo', old('correo'), ['class'=>'form-control']) }}
	</div>

	<div class="form-group">
		<label> Contaseña (Minimo 8 Caracteres)</label>
		@if($errors->first('contrasena'))
			<p class="alert alert-danger"> {{$errors->first('contrasena')}}</p>
 		@endif 
		{{ Form::password('contrasena', ['class'=>'form-control']) }}
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
	{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
	{{ Form::close() }}
@stop 