@extends('layouts.upFormsAdmin')

@section('tableName')
  TableName
@stop

@section('form') 
	<h4 class="modal-title"><img src="" width="50" height="50"> Modificar </h4>


	<a href="#" class="btn btn-danger">Cancelar</a>
	{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}

@stop