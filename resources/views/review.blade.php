@extends('layout.master')
@section('content')
    <div class="col-lg-8 offset-lg-2 text-center mt-5">
        <div class="section-title">
            <h3><span class="orange-text">Review</span> Customers</h3>
        </div>
    </div>
    <div class="container mb-5 mt-5">
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="POST" action="/addReview" id="fruitkha-contact">
                        @csrf
                        <p class="d-flex">
                            <input type="text" placeholder="Name" name="name" id="name">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                       
                            <input type="email" placeholder="Email" name="email" id="email">
                        </p>
                        <p>
                            <input type="tel" placeholder="Phone" name="phone" id="phone">
                            <input type="text" placeholder="Subject" name="subject" id="subject">
                        </p>
                        <p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
                        <input type="hidden" name="token" value="FsWga4&amp;@f6aw">
                        <p><input type="submit" value="Submit"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                     @if ($reviews->isEmpty())
                          <p class="m-auto alert alert-warning text-center m-5">There is no reviews yet</p>
                        @else
                    <div class="testimonial-sliders">
                        @foreach ($reviews as $item)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="{{asset($item->user->avatar)}}" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>{{ $item->name }} <span>{{ $item->subject }}</span></h3>
                                    <p class="testimonial-body">
                                        "{{ $item->message }} "
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
 
@endsection