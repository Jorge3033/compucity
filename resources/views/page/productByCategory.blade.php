@extends('layouts.homeTemplate')
@section('content')
	
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url({{ asset('images/slide-01.jpg') }});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Compucity Categoria
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									{{ $categoria->name }}
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="#" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Go!	
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
				
				<div class="row">
				@foreach ($consulta as $c)
					<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{ asset('photos/'.$c->photo1) }}" alt="IMG-BANNER">

						<a href="#" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<div class="btn btn-light">{{ $c->name }}</div>
								</span>

								<span class="block1-info stext-102 trans-04">
									<div class="btn btn-light" style="text-align: left;">
										Marca:<br>{{ $c->maker }} <br>	
										Descripcion:<br>{{ $c->description }} <br>
										Precio:<br>{{ $c->price}}
											
									</div>
										
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Comprar Ahora
								</div>
							</div>
						</a>
					</div>
				</div>
				@endforeach

			</div>

		</div>
	</div>


@stop