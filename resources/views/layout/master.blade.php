<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Ahmad Store</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href={{ asset('assets/css/all.min.css') }}>
	<!-- bootstrap -->
	<link rel="stylesheet" href={{ asset('assets/bootstrap/css/bootstrap.min.css') }}>
	<!-- owl carousel -->
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

</head>
<body>

	<!--PreLoader-->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	<!--PreLoader Ends-->

	<!-- header -->
	@if(auth()->user()->role == 1)
		<nav class="navbar navbar-expand-lg navbar-light mb-5 sticky-top p-3" style="background-color: #051922 !important;">
			<a class="navbar-brand text-light" href="/admin/dashbord">Dashboard</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon bg-light"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link text-light" href="/">Visit Store</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="/admin/productTable">Products</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="/admin/reviewtable">Reviews</a>
					</li>
					<li class="nav-item">

						<a class="nav-link text-light d-flex align-items-center" href="/admin/messagetable">

							<span>Messages</span>

							@if($unreadMessage > 0)
								<span class="badge bg-danger rounded-pill">
									{{ $unreadMessage }}
								</span>
							@endif

						</a>
					</li>
					<li class="nav-item">
						<form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
							@csrf
							<button type="submit" class="nav-link text-light bg-transparent border-0 w-100 text-start">
								Logout
							</button>
						</form>
					</li>
				</ul>
			</div>
		</nav>
	@else
		<div class="top-header-area" id="sticker">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 text-center">
						<div class="main-menu-wrap">
							<!-- logo -->
							<div class="site-logo">
								<a href="/">
									<img src={{ asset('assets/img/logo.png') }} alt="">
								</a>
							</div>
							<!-- logo -->

							<!-- menu start -->
							<nav class="main-menu">
								<ul>
									<li class="current-list-item"><a href="/">Home</a>
									</li>
									<li><a href="/product">Products</a>
										
									</li>
									<li><a href="/review">Reviews</a></li>

									<li><a href="/contact">Contact</a></li>

									@auth
											<li>
												<a href="#">{{ Auth::user()->name }}</a>
												<ul class="sub-menu">
													<li>
													<li><a href="/profile/{{ auth()->id() }}">profile</a></li>
													<form action="{{ route('logout') }}" method="POST">
														@csrf
														<li><button type="submit"
																style="border:none; background:none; cursor:pointer;">Logout</button>
														</li>
													</form>
											</li>
										</ul>
										</li>
									@endauth

								<li><a href="/category">Shop</a>
									<ul class="sub-menu">
										<li><a href="/category">Shop</a></li>
										<li><a href="/cart">Cart</a></li>
									</ul>
								</li>
								<li>
									<div
										class="header-icons  relative flex items-center space-x-4 nav-link text-light d-flex align-items-center">
										<a class="shopping-cart d-flex align-items-center" href="/cart"><i
												class="fas fa-shopping-cart"></i></a>
												@if($cartTotal())
										<span
											class=" position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $cartTotal() }}</span>


								@endif
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
								</ul>
							</nav>
							<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
							<div class="mobile-menu"></div>
							<!-- menu end -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end header -->

		<!-- search area -->
		<div class="search-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<span class="close-btn"><i class="fas fa-window-close"></i></span>
						<div class="search-bar">
							<div class="search-bar-tablecell">
								<h3>Search For:</h3>
								<form method="POST" action="/search">
									@csrf
									<input type="text" placeholder="Keywords" name="search">
									<button type="submit">Search <i class="fas fa-search"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end search area -->

		<!-- home page slider -->

		<div class="homepage-slider">
			<!-- single home slider -->
			<div class="single-homepage-slider homepage-bg-1">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
							<div class="hero-text">
								<div class="hero-text-tablecell">
									<p class="subtitle">Fresh & Organic</p>
									<h1>Delicious Seasonal Fruits</h1>
									<div class="hero-btns">
										<a href="/category" class="boxed-btn">Our Collection</a>
										<a href="/contact" class="bordered-btn">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- single home slider -->
			<div class="single-homepage-slider homepage-bg-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1 text-center">
							<div class="hero-text">
								<div class="hero-text-tablecell">
									<p class="subtitle">Fresh Everyday</p>
									<h1>100% Organic Collection</h1>
									<div class="hero-btns">
										<a href="/category" class="boxed-btn">Visit Shop</a>
										<a href="/contact" class="bordered-btn">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- single home slider -->
			<div class="single-homepage-slider homepage-bg-3">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1 text-right">
							<div class="hero-text">
								<div class="hero-text-tablecell">
									<p class="subtitle">Mega Sale Going On!</p>
									<h1>Get December Discount</h1>
									<div class="hero-btns">
										<a href="/category" class="boxed-btn">Visit Shop</a>
										<a href="/contact" class="bordered-btn">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif

	<!-- end home page slider -->
	@yield('content')
	<!-- footer -->
	<footer class="footer-area">
		<div class="container">

            <hr class="border-secondary">

            <!-- Bottom Section -->
            <div class="text-center text-muted">
                © {{ date('Y') }} MyStore. All rights reserved.
            </div>
        </div>
	</footer>
	<!-- end footer -->

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