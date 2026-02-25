@extends('layout.master')
@section('content')
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>The Products we have in our site. </p>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach ($products as $product)
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="/singleProduct/{{ $product->id }}"><img src="{{ url($product->imagepath) }}"
										style="max-height:250px !important;min-height:250px !important;" alt=""></a>
							</div>
							<h3>{{$product->name}}</h3>
							<p class="product-price"><span>Per Kg</span> {{ $product->price }}$ </p>
							@if (auth()->user()->role !=1)
									<form action="/addCart" method="POST">
								@csrf
								 <input type="hidden" name="product_id" value="{{ $product->id }}">
							<button class="btn btn-warning" style="background-color:#F28123 !important;"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
							</form>
						
							@endif
						
						</div>
					</div>
				@endforeach
		
		</div>
		
			<div style="text-align: center" class="mb-5">
					{{ $products->links() }}
				</div>
			
	</div>
@endsection
<style>
	svg{
		height: 50px !important;
	}
</style>