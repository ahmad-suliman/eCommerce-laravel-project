@extends('layout.master')
@section('content')

    <div class="single-product mt-100 mb-150">
        <div class="container">
            <div class="section-title text-center">
                <h3><span class="orange-text ">Product</span> Details</h3>

            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="single-product-img">
                        <img src="{{asset($product->imagepath)}}" width="300px" height="300px" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing"><span>Per Kg</span> $ {{ $product->price }}</p>
                        <p>{{ $product->description }}</p>
                        <div class="single-product-form">
                            <p>Quantity : {{ $product->quantity }}</p>
                            <p><strong>Category: </strong>{{$product->category->name}}</p>
                            @if (auth()->user()->role != 1)
                                <form action="/addCart" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="btn btn-warning" style="background-color:#F28123 !important;"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                </form>
                            @endif
                           

                        </div>
                        @if($product->imageProduct)


                                <div class="row">

                                    <div class="testimonial-sliders">
                                        @foreach ($product->imageProduct as $image)
                                            <div class="single-testimonial-slider">
                                                <div class="client-avater">
                                                    <img src="{{asset($image->imagepath)}}" width="200px" height="200px" alt="">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @endif
                </div>
            </div>
            @if ($relatedProduct)
                <div class="section-title text-center m-5">
                    <h3><span class="orange-text ">Related</span> Products</h3>
                </div>
                <div class="row m-5">

                    @foreach ($relatedProduct as $product)
                        <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="/singleProduct/{{ $product->id }}"><img src="{{asset($product->imagepath)}}"
                                            width="200px" height="200px"></a>
                                </div>
                                <h3>{{$product->name}}</h3>
                                <p class="product-price"><span>Per Kg</span> {{ $product->price }} $ </p>
                                 @if (auth()->user()->role != 1)
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
            @endif
        </div>
    </div>


@endsection