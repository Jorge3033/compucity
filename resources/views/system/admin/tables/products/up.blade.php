@extends('layouts.upFormsAdmin')

@section('tableName')
  Categorias
@stop

@section('form') 
	<h4 class="modal-title"><img src="{{ asset('photos/folder.jfif') }}" width="50" height="50"> Alta </h4>
	
	{{ Form::open(['route'=>'upProduct','files'=>true]) }}
	{{ Form::token() }}
	<div class="form-control border-0">
		<label>Nombre</label>
		@if($errors->first('nombre'))
			<p class="alert alert-danger"> {{$errors->first('nombre')}}</p>	
 		@endif 
		{{ Form::text('nombre', old('nombre'), ['class'=>'form-control']) }}
	</div> 

	<div class="form-control border-0">
		<label>Marca</label>
		@if($errors->first('marca'))
			<p class="alert alert-danger"> {{$errors->first('marca')}}</p>	
 		@endif 
		{{ Form::text('marca', old('marca'), ['class'=>'form-control']) }}
	</div>

	<div class="form-control border-0">
		<label>Precio</label>
		@if($errors->first('precio'))
			<p class="alert alert-danger"> {{$errors->first('precio')}}</p>	
 		@endif 
		{{ Form::number('precio', old('precio'), ['class'=>'form-control']) }}
	</div>

	<div class="form-control border-0">
		<label>Cantidad</label>
		@if($errors->first('cantidad'))
			<p class="alert alert-danger"> {{$errors->first('cantidad')}}</p>	
 		@endif 
		{{ Form::number('cantidad', old('cantidad'), ['class'=>'form-control']) }}
	</div>
	
	<div class="form-control border-0">
		<label>Categoria</label>
		<select name="categoria" class="form-control">
			@foreach ($categories as $c)
				<option value="{{ $c->id }}">{{ $c->name }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-control border-0">
		<label>Descripcion</label>
		@if($errors->first('descripcion'))
			<p class="alert alert-danger"> {{$errors->first('descripcion')}}</p>	
 		@endif 
		{{ Form::text('descripcion', old('descripcion'), ['class'=>'form-control']) }}
	</div>	

	<div class="form-control border-0">
		<label>Foto 1</label>
		@if($errors->first('foto1'))
			<p class="alert alert-danger"> {{$errors->first('foto1')}}</p>	
 		@endif 
		{{ Form::file('foto1', old('foto1'), ['class'=>'form-control']) }}
	</div>

	<div class="form-control border-0">
		<label>Foto 2</label>
		@if($errors->first('foto2'))
			<p class="alert alert-danger"> {{$errors->first('foto2')}}</p>	
 		@endif 
		{{ Form::file('foto2', old('foto2'), ['class'=>'form-control']) }}
	</div>

	<div class="form-control border-0">
		<label>estado</label>
		<select name="estado" class="form-control">
			<option value="activo">Activo</option>
		</select>
	</div>

	<a href="#" class="btn btn-danger">Cancelar</a>
	{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}

@stop