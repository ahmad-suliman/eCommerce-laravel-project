@extends('layout.master')
@section('content')
    <div class="contact-from-section mt-150 mb-150">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
                <h3><span class="orange-text">Add</span> Products</h3>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="contact-form">
                        <form method="POST" enctype="multipart/form-data" action="/storeproduct">
                                @csrf
                                <p>
                                    <input style=" width: 100%;" type="text" placeholder="Name" name="name" id="name"
                            required>
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </p>
                            <p style="display: flex;">
                                <input style="width: 50%; margin-right: 18px;" type="number" placeholder="Price"
                                    name="price" id="price" required>
                                <input style="width: 50%;" type="number" placeholder="Quantity" name="quantity"
                                    id="quantity" required>
                            </p>
                            <p>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="description"
                                    required></textarea>
                            </p>
                            <p>
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </p>
                            <p>
                                <input class="form-control" type="file" name="photo" id="photo">
                                <span class="text-danger">
                                    @error('photo')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p><input type="submit" value="Add"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection