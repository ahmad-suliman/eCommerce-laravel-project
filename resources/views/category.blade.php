@extends('layout.master')

@section('content')
    <div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($categories as $item)
                                <li data-filter="._{{ $item->id }}">{{$item->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists" style="position: relative; height: 1667.1px;">
				@foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center _{{ $item->category_id }}" style="position: absolute; left: 0px; top: 0px;">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/singleProduct/{{ $item->id }}"><img style="min-height:250px;max-height:250px;" src="{{ asset($item->imagepath) }}" alt=""></a>
						</div>
						<h3>{{$item ->name}}</h3>
						<p class="product-price"><span>Price</span> {{$item->price}}$ </p>
                        <p class="product-price"><span>Quantity</span> {{$item->quantity}} </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
                @endforeach
			</div>

			
		</div>
	</div>
@endsection