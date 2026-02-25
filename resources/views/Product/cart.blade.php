@extends('layout.master')
@section('content')
    @if (session()->has('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)

                                    <tr class="table-body-row">
                                        <td class="product-remove"><a href="{{  url('/deleteItem/' . $item->id) }}"><i
                                                    class="far fa-window-close"></i></a></td>
                                        <td class="product-image"><img src="{{asset($item->product->imagepath)}}" alt=""></td>
                                        <td class="product-name">{{$item->product->name}}</td>
                                        <td class="product-price">{{ $item->product->price }} $</td>
                                        <td class="product-quantity">{{$item->quantity}}</td>
                                        <td class="product-total">{{$item->product->price * $item->quantity}} $</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4 mb-150">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>
                                        {{ $cart->sum(function ($item) {
                                         return ($item->product->price * $item->quantity);
                                            })}}                   
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($cart->count() > 0)
                                <div class="cart-buttons">
                                    <p class="m-2"> <strong>4242 4242 4242 4242</strong>
                                        <span class="d-block">this is facke card for payment</span>
                                    </p>
                                    <form action="{{ route('checkout.session') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-warning"
                                            style="background-color:#F28123 !important;">Check Out</button>
                                    </form>
                                </div>
                            </div>
                        @endif


                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
             @if (session(key: 'cancle'))
                <div class="alert alert-success">{{ session('cancle') }}</div>
            @endif
        </div>
    </div>
    <!-- end cart -->


@endsection