@extends('layout.master')
@section('content')
    <div class="container mt-5 mb-5">

        <div class="section-title text-center">
            <h3><span class="orange-text">Contact</span> Us</h3>
            <p>Have Any Problem Don't Be Shy And Send it</p>

        </div>

        <div class="col-lg-12  mb-lg-0">
            @if (session('success'))
                <div id="success-alert-sent" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div id="form_status"></div>
            <div class="contact-form">
                <form method="POST" action="/storgemessage">
                    @csrf
                    <p>
                        <input type="text" placeholder="Name" name="name" id="name">
                        <input type="email" placeholder="Email" name="email" id="email">
                    </p>
                    <p>
                        <input type="tel" placeholder="Phone" name="phone" id="phone">
                        <input type="text" placeholder="Subject" name="subject" id="subject">
                    </p>
                    <p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
                    <input type="hidden" name="user_id" value="{{auth()->id()}}">
                    <p><input type="submit" value="Submit"></p>
                </form>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function () {
            let alert = document.getElementById('success-alert-sent');
            if (alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    </script>
@endsection