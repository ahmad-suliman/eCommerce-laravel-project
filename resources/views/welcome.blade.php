@extends('layout.master')
@section('content')
<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Product </span> Categories</h3>
						<p>This The Categorys Of Our Products</p>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach ($categories as $category)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/product/{{ $category->id }}"><img src="{{ url($category->imagepath) }}" alt="" style="max-height:250px !important;min-height:250px !important"></a>
						</div>
						<h3>{{$category->name}}</h3>
					</div>
				</div>
			@endforeach
			</div>
		</div>
</div>
@endsection