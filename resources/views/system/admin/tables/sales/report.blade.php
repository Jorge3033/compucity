@extends('layouts.reportTemplateAdmin') 

@section('tableTitle')
	Title <a href="formUp"><i class="fas fa-plus-circle text-success"></i></a> 
@stop

@section('topTitle')
	<th>Example</th>
@stop

@section('lowerTitle')
<th>Example</th>
@stop

@section('records')

	<td>

		<a href="{{-- URL::action('AdminsController@unlock',['AdminId'=>$r->id]) --}}"><div class="h2 "><i class="fas fa-unlock-alt"></i></div></a>

		<a href="{{-- URL::action('AdminsController@lock',['AdminId'=>$r->id]) --}}"><div class="btn btn-danger"><i class="fas fa-lock "></i></div></a>
          <a href="{{-- URL::action('AdminsController@modificarAdmin',['AdminId'=>$r->id]) --}}"><i class="fas fa-edit btn btn-warning"></i></a>

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
                    <h4 class="modal-title"><img src="" width="50" height="50"> Titulo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                 <!-- Modal body -->
                  <div class="modal-body">
                    Contenido
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
              </div>
            </div>
          </div>
 </td>

@stop