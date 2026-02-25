@extends('layout.master')
@section('content')
    <div class="contact-from-section mt-150 mb-150">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
                <h3><span class="orange-text">Edit</span> Products</h3>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="contact-form">
                        <form method="POST" enctype="multipart/form-data" action="/storeproduct">
                            @csrf
                            <p>
                                <input type="hidden" value="{{ $product->id }}" name="id" id="id">
                                <input style="width: 100%;" type="text" value="{{ $product->name }}" name="name" id="name"
                                    required>

                            </p>
                            <p style="display: flex;">
                                <input style="width: 50%; margin-right: 18px;" type="number" placeholder="Price"
                                    name="price" id="price" value="{{ $product->price }}" required>
                                <input style="width: 50%;" type="number" placeholder="Quantity" name="quantity"
                                    id="quantity" value="{{ $product->quantity }}" required>
                            </p>
                               <p>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="description"
                                    required>{{ $product -> description }}</textarea>
                            </p>
                            <p>
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}" {{ $product->category_id == $item -> id ? 'selected' :'' }}>{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </p>
                            <p>
                                <input type="file" name="photo" id="photo" class="form-control mb-4">
                                <img src="{{ asset($product->imagepath) }}" width="250" height="250">
                            </p>
                            <input type="hidden" name="token" value="FsWga4&amp;@f6aw">
                            <p><input type="submit" value="Edit"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection