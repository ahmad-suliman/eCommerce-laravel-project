<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="flexilecode" />

    <!--! BEGIN: Apps Title-->
    <title>Adimn || Dashboard</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
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
    @if (auth()->user()->role == 1)
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
                        <form action="{{{route('logout')}}}" method="POST" class="m-0 p-0">
                            @csrf
                            <button type="submit" class="nav-link text-light bg-transparent border-0 w-100 text-start">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <!--! ================================================================ !-->
        <!--! [Start] Main Content !-->
        <!--! ================================================================ !-->
        <main class="container my-5">
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
                    <div class="card h-100 shadow rounded-lg border-0 hover-scale">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title text-primary"><i class="fas fa-user-friends fa-3x"></i></h5>
                            <h6 class="card-title text-danger">Total Members</h6>
                            <h2 class="card-text text-muted">
                                {{ auth()->user()->count() }}
                            </h2>
                            <a href="/admin/usertable" class="btn btn-outline-primary btn-sm">Show Users</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
                    <div class="card h-100 shadow rounded-lg border-0 hover-scale">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title text-success"><i class="fas fa-envelope fa-3x"></i></h5>
                            <h6 class="card-title text-danger">Unread Messages</h6>
                            <h2 class="card-text text-muted">
                                {{$totalMessages->count()}}
                            </h2>
                            <a href="/admin/messagetable" class="btn btn-outline-success btn-sm">Show Messages</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
                    <div class="card h-100 shadow rounded-lg border-0 hover-scale">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title text-warning"><i class="fas fa-chart-pie fa-3x"></i></h5>
                            <h6 class="card-title text-danger">Total Products</h6>
                            <h2 class="card-text text-muted">
                                {{$totalProducts->count()}}
                            </h2>
                            <a href="/admin/productTable" class="btn btn-outline-warning btn-sm">Show Products</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
                    <div class="card h-100 shadow rounded-lg border-0 hover-scale">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title text-danger"><i class="fas fa-poll fa-3x"></i></h5>
                            <h6 class="card-title text-danger">Total Reviews</h6>
                            <h2 class="card-text text-muted">
                                {{$totalReviews->count()}}
                            </h2>
                            <a href="/admin/reviewtable" class="btn btn-outline-danger btn-sm">Show Review</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <!-- Card Header -->
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 fw-bold">
                                <i class="fas fa-envelope text-warning me-2"></i>
                                Latest Messages
                            </h6>
                            <span class="badge bg-warning text-dark">
                                {{ count($latestMessage) }}
                            </span>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body p-0">
                            @forelse ($latestMessage as $message)
                                <div class="d-flex justify-content-between align-items-center px-3 py-2 border-bottom">
                                    <!-- Message text -->
                                    <div class="text-truncate" style="max-width: 70%;">
                                        <small class="text-muted">
                                            {{ \Illuminate\Support\Str::limit($message->message, 50) }}
                                        </small>
                                    </div>
                                    <!-- Action button -->
                                    <a href="/admin/markmessage/{{ $message->id }}"
                                        class="btn btn-sm btn-outline-success {{ $message->is_read ? 'disabled' : '' }}"
                                        title="Mark as Read">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </div>
                            @empty
                                <div class="text-center py-4 text-muted">
                                    No new messages
                                </div>
                            @endforelse
                        </div>
                        <!-- Optional Footer -->
                        <div class="card-footer text-center bg-white">
                            <a href="/admin/messagetable" class="small text-decoration-none">
                                View All Messages
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <!-- Card Header -->
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 fw-bold">
                                <i class="fas fa-box text-primary me-2"></i>
                                Latest Products
                            </h6>
                            <span class="badge bg-primary">
                                {{ count($latestProduct) }}
                            </span>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body p-0">
                            @forelse ($latestProduct as $product)
                                <div class="d-flex align-items-center justify-content-between px-3 py-3 border-bottom">
                                    <!-- Product Info -->
                                    <div class="d-flex align-items-center">
                                        <!-- Product Image -->
                                        <img src="{{ asset($product->imagepath) }}" alt="product" class="rounded me-3"
                                            width="50" height="50" style="object-fit: cover;">
                                        <!-- Product Details -->
                                        <div>
                                            <div class="fw-semibold">
                                                {{ \Illuminate\Support\Str::limit($product->name, 30) }}
                                            </div>
                                            <small class="text-muted">
                                                ${{ $product->price }}
                                            </small>
                                        </div>
                                    </div>
                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-2">
                                        <a href="/singleProduct/{{ $product->id }}" class="btn btn-sm btn-outline-primary"
                                            title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="/editproduct/{{ $product->id }}" class="btn btn-sm btn-outline-warning"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-4 text-muted">
                                    No products available
                                </div>
                            @endforelse
                        </div>
                        <!-- Footer -->
                        <div class="card-footer text-center bg-white">
                            <a href="/admin/productTable" class="small text-decoration-none">
                                View All Products
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <!-- Card Header -->
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 fw-bold">
                                <i class="fas fa-users text-success me-2"></i>
                                Latest Users
                            </h6>
                            <span class="badge bg-success">
                                {{ count($leatestUsers) }}
                            </span>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body p-0">
                            @forelse ($leatestUsers as $user)
                                <div class="d-flex justify-content-between align-items-center px-3 py-3 border-bottom">

                                    <!-- User Info -->
                                    <div class="d-flex align-items-center">

                                        <!-- Avatar (Default Circle) -->
                                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width:45px; height:45px; font-size:18px;">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <!-- Name + Email -->
                                        <div>
                                            <div class="fw-semibold">
                                                {{ $user->name }}
                                            </div>
                                            <small class="text-muted">
                                                {{ $user->email }}
                                            </small>
                                        </div>
                                    </div>
                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-2">
                                        <a href="/profile/{{ $user->id }}" class="btn btn-sm btn-outline-primary"
                                            title="View Profile">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="/admin/deleteuser/{{ $user->id }}" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this user?')" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-4 text-muted">
                                    No new users
                                </div>
                            @endforelse
                        </div>
                        <!-- Footer -->
                        <div class="card-footer text-center bg-white">
                            <a href="/admin/usertable" class="small text-decoration-none">
                                View All Users
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shadow-sm border-0 h-100">

                        <!-- Card Header -->
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 fw-bold">
                                <i class="fas fa-star text-warning me-2"></i>
                                Latest Reviews
                            </h6>
                            <span class="badge bg-warning text-dark">
                                {{ count($latestReviews) }}
                            </span>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body p-0">
                            @forelse ($latestReviews as $review)
                                <div class="px-3 py-3 border-bottom">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <!-- Reviewer Info -->
                                        <div>
                                            <div class="fw-semibold">
                                                {{ $review->user->name ?? 'Unknown User' }}
                                            </div>
                                        </div>
                                        <!-- Delete Button -->
                                        <a href="/admin/deletereview/{{ $review->id }}" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this review?')" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                    <!-- Review Text -->
                                    <p class="small text-muted mt-2 mb-0">
                                        {{ \Illuminate\Support\Str::limit($review->message, 80) }}
                                    </p>
                                </div>
                            @empty
                                <div class="text-center py-4 text-muted">
                                    No recent reviews
                                </div>
                            @endforelse
                        </div>
                        <!-- Footer -->
                        <div class="card-footer text-center bg-white">
                            <a href="/admin/reviewtable" class="small text-decoration-none">
                                View All Reviews
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--! ================================================================ !-->
        <!--! [End] Main Content !-->
        <!--! ================================================================ !-->
        <footer class="text-light pb-3 mt-5" style="background-color: #051922 !important;">
            <div class="container">
                <hr class="border-secondary">
                <!-- Bottom Section -->
                <div class="text-center small text-muted">
                    © {{ date('Y') }} MyStore. All rights reserved.
                </div>
            </div>
        </footer>
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
    @else
        <div class="alert alert-danger">
            OOPS!! You Can't enter to this page :>
        </div>
    @endif
</body>
</html>