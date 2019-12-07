@extends('layouts.reportTemplateAdmin') 

@section('tableTitle')
	Productos <a href="formUpProduct"><i class="fas fa-plus-circle text-success"></i></a> 
@stop

@section('topTitle')
  <th>Foto</th>
  <th>Nombre</th>
	<th>Marca</th>
  <th>Precio</th>
  <th>Acciones</th>
@stop 

@section('lowerTitle')
  <th>Foto</th>
  <th>Nombre</th>
  <th>Marca</th>
  <th>Precio</th>
  <th>Acciones</th>
@stop

@section('records')

  @foreach ($report as $r)
  <tr>
  <td><img src="{{ asset('photos/'.$r->photo1) }}" width="50px" height="50px"></td>
  <td>{{ $r->name }}</td>
  <td>{{ $r->maker }}</td>
  <td>{{ $r->price }}</td>
	<td>
		<a href="{{ URL::action('ProductController@lock',['id'=>$r->id]) }}"><div class="btn btn-danger"><i class="fas fa-lock "></i></div></a>
          <a href="{{ URL::action('ProductController@formModify',['id'=>$r->id]) }}"><i class="fas fa-edit btn btn-warning"></i></a>

  	<!-- Modal De informacion de Admin-->
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
            <i class="fas fa-info-circle"></i>
           </button>
          <!-- The Modal -->
          <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">   
                <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"><img src="{{ asset('photos/'.$r->photo1) }}" 
                      width="50" height="50"> {{ $r->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                 <!-- Modal body -->
                  <div class="modal-body">
                    <label >id: {{ $r->id }}</label><br>
                    <label >Nombre: {{ $r->name }}</label><br>
                    <label >Marca: {{ $r->maker }}</label><br>
                    <label >Precio: {{ $r->price }}</label><br>
                    <label >Descripción: {{ $r->description }}</label><br>
                    <label for="">Imagenes</label><br>
                    <img src="{{ asset('photos/'.$r->photo1) }}" alt="" width="80px" height="80px">
                    <img src="{{ asset('photos/'.$r->photo2) }}" alt="" width="80px" height="80px">
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
              </div>
            </div>
          </div>
 </td>
</tr> 
@endforeach
@stop