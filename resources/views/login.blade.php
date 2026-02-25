<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href={{ asset('assets/css/all.min.css') }}>
    <!-- bootstrap -->
    <link rel="stylesheet" href={{ asset('assets/bootstrap/css/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/owl.carousel.css') }}>
    <!-- magnific popup -->
    <link rel="stylesheet" href={{ asset('assets/css/magnific-popup.css') }}>
    <!-- animate css -->
    <link rel="stylesheet" href={{ asset('assets/css/animate.css') }}>
    <!-- mean menu css -->
    <link rel="stylesheet" href={{ asset('assets/css/meanmenu.min.css') }}>
    <!-- main style -->
    <link rel="stylesheet" href={{ asset('assets/css/main.css') }}>
    <!-- responsive -->
    <link rel="stylesheet" href={{ asset('assets/css/responsive.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/all.css') }}>
</head>

<body>
    <div class="contact-from-section mt-5">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
                <h3><span class="orange-text">Login</span> Page</h3>

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5 mt-5 mb-lg-0">
                        <div class="contact-form">
                            <form method="POST" action="/login">
                                @csrf
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>  
                            @enderror
                                    <input type="email" class="form-control mb-3" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email" placeholder="Enter email">
                                  
                               
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>  
                            @enderror
                                    <input type="password" name="password" class="form-control mb-2" id="exampleInputPassword1"
                                        placeholder="Password">
                                
                                <p>You Don't Have Account? <a href="/signup">Create One</a></p>
                                <button type="submit" class="btn btn-warning">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery -->
    <script src={{ asset('assets/js/jquery-1.11.3.min.js') }}></script>
    <!-- bootstrap -->
    <script src={{ asset('assets/bootstrap/js/bootstrap.min.js') }}></script>
    <!-- count down -->
    <script src={{ asset('assets/js/jquery.countdown.js') }}></script>
    <!-- isotope -->
    <script src={{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}></script>
    <!-- waypoints -->
    <script src={{ asset('assets/js/waypoints.js') }}></script>
    <!-- owl carousel -->
    <script src={{ asset('assets/js/owl.carousel.min.js') }}></script>
    <!-- magnific popup -->
    <script src={{ asset('assets/js/jquery.magnific-popup.min.js') }}></script>
    <!-- mean menu -->
    <script src={{ asset('assets/js/jquery.meanmenu.min.js') }}></script>
    <!-- sticker js -->
    <script src={{ asset('assets/js/sticker.js') }}></script>
    <!-- main js -->
    <script src={{ asset('assets/js/main.js') }}></script>

</body>

</html>