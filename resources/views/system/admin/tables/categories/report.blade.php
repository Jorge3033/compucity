@extends('layouts.reportTemplateAdmin') 

@section('tableTitle')
	Categoorias <a href="formUpCategory"><i class="fas fa-plus-circle text-success"></i></a> 
@stop 

@section('topTitle')
  <th>img</th>
  <th>ID</th>
  <th>Nombre</th>
	<th>Acciones</th>
@stop

@section('lowerTitle')
  <th>img</th>
  <th>ID</th>
  <th>Nombre</th>
  <th>Acciones</th>
@stop

@section('records')

@foreach ($report as $r)
  
<tr>
   <td><img src="{{ asset('photos/folder.jfif') }}" width="50px" height="50px"></td>
  <td>{{ $r->id }}</td>
  <td>{{ $r->name }}</td>
	<td>
		
          <a href="{{ URL::action('CategoryController@formModify',['id'=>$r->id]) }}"><i class="fas fa-edit btn btn-warning"></i></a>

  	
 </td> 
</tr>
 @endforeach

@stop