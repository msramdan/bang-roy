<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $company = setting_web();
        $social = social();
    @endphp
    <meta charset="utf-8">
    <meta name="author" content="pixelstrap">
    <meta name="description" content="{{ $company->nama_perusahaan }}">
    <meta name="keywords" content="{{ $company->nama_perusahaan }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $company->nama_perusahaan }}</title>
    <link rel="shortcut icon" href="{{ asset('landing/assets/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('landing') }}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/assets/css/themify.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing') }}/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing') }}/assets/css/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing') }}/assets/css/color5.css" media="screen"
        id="color">
</head>

<body>

    <!-- loader start -->
    <div class="loader-wrapper">
        <div class="loader">
            <div></div>
        </div>
    </div>
    <!-- loader end -->

    <div class="ecommerce-layout">

        <!--Top-Section-->
        <div class="top-contact top-header commerce-layout">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-none d-md-block">
                        <ul class="top-header-left">
                            <li>Welcome to our website {{ $company->nama_perusahaan }}</li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul class="top-header-right">
                            <li><a href="{{ $social->link_facebook }}" target="_blank"><i class="fa fa-facebook"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="{{ $social->link_twitter }}" target="_blank"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="{{ $social->link_youtube }}" target="_blank"><i class="fa fa-youtube"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="{{ $social->link_instagram }}" target="_blank"><i class="fa fa-instagram"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="mid-header">
                <div class="container">
                    <div class="row">
                        <div class=" col-3">
                            <a href="/" class="brand-logo"><img
                                    src="{{ asset('landing') }}/assets/images/ecommerce/logo.png" alt="logo"></a>
                        </div>
                        <div class="col-9">
                            <div class="nav-section">
                                <nav id="main-nav">
                                    <div class="toggle-nav">
                                        <i class="fa fa-bars sidebar-bar"></i>
                                    </div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                    aria-hidden="true"></i></div>
                                        </li>
                                        <li>
                                            <a href="/">Home</a>
                                        </li>
                                        <li>
                                            <a href="#" class="has-submenu" id="sm-17005289088241277-3" aria-haspopup="true" aria-controls="sm-17005289088241277-4" aria-expanded="false">About Us<span class="sub-arrow"></span></a>
                                            <ul id="sm-17005289088241277-4" role="group" aria-hidden="true" aria-labelledby="sm-17005289088241277-3" aria-expanded="false">
                                                <li class="nav-item"><a class="nav-link" href="{{route('web-company')}}">Company</a></li>
                                                <li class="nav-item"><a class="nav-link" href="{{route('web-certificates')}}">Certificates</a></li>
                                                <li class="nav-item"><a class="nav-link" href="{{route('web-team')}}">Teams</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{route('web-service')}}">Business Units</a>
                                        </li>
                                        <li>
                                            <a href="{{route('web-catalog')}}">Catalog</a>
                                        </li>

                                        <li>
                                            <a href="{{route('web-portfolio')}}">Portfolio</a>
                                        </li>
                                        <li>
                                            <a href="{{route('web-contact')}}">Contact Us</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <section class="newsletter_sec newsletter-ecommerce" style="padding: 5px">
        </section>
        <footer class="footer-ecommerce">
            <div class="upper-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_first">
                                <div class="footer-title mobile-title">
                                    <h3>About Us</h3>
                                </div>
                                <div class="footer-contant">
                                    <img src="{{ asset('landing') }}/assets/images/ecommerce/Footer-logo.png"
                                        class="foot_logo" alt="">
                                    <p>Lorem Ipsum is simply dummy text of the printing and type-setting industry.</p>
                                    <div class="footer_social">
                                        <div>
                                            <ul>
                                                <li><a href="{{ $social->link_facebook }}" target="_blank"><i
                                                            class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="{{ $social->link_twitter }}" target="_blank"><i
                                                            class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="{{ $social->link_youtube }}" target="_blank"><i
                                                            class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                                <li><a href="{{ $social->link_instagram }}" target="_blank"><i
                                                            class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_second">
                                <div>
                                    <div class="footer-title">
                                        <h3>Catalog</h3>
                                    </div>
                                    <div class="footer-contant">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-chevron-circle-right"></i>-</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-chevron-circle-right"></i>-</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-chevron-circle-right"></i>-</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-chevron-circle-right"></i>-</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-chevron-circle-right"></i>-</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_second">
                                <div>
                                    <div class="footer-title">
                                        <h3>Information</h3>
                                    </div>
                                    <div class="footer-contant">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-chevron-circle-right"></i>Home</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-chevron-circle-right"></i>About
                                                    Us</a></li>
                                            <li><a href="#"><i
                                                        class="fa fa-chevron-circle-right"></i>Service</a></li>
                                            <li><a href="#"><i
                                                        class="fa fa-chevron-circle-right"></i>Portfolio</a></li>
                                            <li><a href="#"><i class="fa fa-chevron-circle-right"></i>Contact
                                                    Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_forth">
                                <div class="footer-title">
                                    <h3>Information</h3>
                                </div>
                                <div class="footer-contant">
                                    <ul>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $company->alamat }}
                                        </li>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us:
                                            {{ $company->telepon }}</li>
                                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i>Email Us:
                                            {{ $company->email }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="tap-top top-cls top_5">
            <div>
                <i class="fa fa-angle-double-up"></i>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content quick-view-modal">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <div class="quick-view-img">
                                    <img src="{{ asset('landing') }}/assets/images/pro/9.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 rtl-text">
                                <div class="product-right">
                                    <h2>Hammer Drill</h2>
                                    <h3>$32.96</h3>
                                    <div class="border-product">
                                        <h6 class="product-title">product details</h6>
                                        <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium</p>
                                    </div>
                                    <div class="product-description border-product">
                                        <div class="size-box">
                                            <ul>
                                                <li class="active"><a href="#">s</a></li>
                                                <li><a href="#">m</a></li>
                                                <li><a href="#">l</a></li>
                                                <li><a href="#">xl</a></li>
                                            </ul>
                                        </div>
                                        <h6 class="product-title">quantity</h6>
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-left-minus"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity"
                                                    class="form-control input-number" value="1">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-right-plus"
                                                        data-type="plus" data-field="">
                                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-buttons">
                                        <a href="#" class="btn btn-solid">add to cart</a>
                                        <a href="#" class="btn btn-solid">view detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('landing') }}/assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('landing') }}/assets/js/jquery.magnific-popup.js"></script>
    <script src="{{ asset('landing') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('landing') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('landing') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('landing') }}/assets/js/menu.js"></script>
    <script src="{{ asset('landing') }}/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('landing') }}/assets/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('landing') }}/assets/js/slick.js"></script>
    <script src="{{ asset('landing') }}/assets/js/script.js"></script>
    <script src="{{ asset('landing') }}/assets/js/ecommerce.js"></script>

</body>

</html>
