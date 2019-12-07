@extends('layouts.upFormsAdmin')

@section('tableName')
  Alta
@stop

@section('form') 
	<h4 class="modal-title"><img src="{{ asset('photos/folder.jfif') }}" width="50" height="50"> Categorias </h4>

	{{ Form::open(['route'=>'modifyCategory','files'=>true]) }}
    {{ Form::token() }}
	
	<div class="form-group">
		<label for="">Id</label>
		<input type="text" value="{{ $consulta->id }}" readonly class="form-control" name="id">
	</div>

	<div class="form-control border-0">
		<label>Nombre</label>
		@if($errors->first('nombre'))
			<p class="alert alert-danger"> {{$errors->first('nombre')}}</p>	
 		@endif 
		{{ Form::text('nombre',  $consulta->name , ['class'=>'form-control']) }}
	</div>
	<a href="#" class="btn btn-danger">Cancelar</a>
	{{ Form::submit('Modificar', ['class'=>'btn btn-warning']) }}
	
@stop