@extends('layout.master')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="section-title text-center ">
            <h3 class="f-5"><span class="orange-text">{{ auth()->user()->name }}</span> Profile </h3>
        </div>
       
        <div class="row">
            <div class="col-md-3">
                <div class="single-product-img">
                    <img src="{{asset(auth()->user()->avatar)}}" width="300px" height="300px" alt="">
                
                </div>
            </div>
            <div class="col-md-3">
                <div class="single-product-content">
                      <a href="#" class="btn btn-primary mb-3 "><i class="fas fa-edit"></i> Edit Info</a>
                   <p><strong>Name : </strong> {{auth()->user()->name}}</p>
                   <p><strong>Email : </strong> {{auth()->user()->email}}</p>
                   
                    </div>


                    
                </div>
            </div>
        </div>
    </div>

@endsection