@extends('layouts.upFormsAdmin')

@section('tableName')
  Alta
@stop

@section('form') 
	<h4 class="modal-title"><img src="{{ asset('photos/folder.jfif') }}" width="50" height="50"> Categorias </h4>

	{{ Form::open(['route'=>'upCategory','files'=>true]) }}
    {{ Form::token() }}
	
	<div class="form-control border-0">
		<label>Nombre</label>
		@if($errors->first('nombre'))
			<p class="alert alert-danger"> {{$errors->first('nombre')}}</p>	
 		@endif 
		{{ Form::text('nombre', old('nombre'), ['class'=>'form-control']) }}
	</div>
	<a href="#" class="btn btn-danger">Cancelar</a>
	{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
	
@stop