@extends('layouts.adminTemplate')

@section('content')
	<div class="container w-50">
  
  <div class="card" style="width:400px">
    <img class="card-img-top" src="{{ asset('photos/ok.jfif') }}" alt="Card image" style="width:50%">
    <div class="card-body">
      <h4 class="card-title">{{ $nombre }}</h4>
		Ha sido {{ $accion }}
      	</p>
      <a href="/reportUser" class="btn btn-primary">Continuar</a>
    </div>
  </div>
  
  
</div>
@stop