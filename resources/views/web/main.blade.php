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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

<body>

    {{-- <div class="loader-wrapper">
        <div class="loader">
            <div></div>
        </div>
    </div> --}}

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
                            <a href="/" class="brand-logo">
                                @if (setting_web()->logo != null)
                                    <img style="width: 250px"
                                        src="{{ Storage::url('public/uploads/logos/') . setting_web()->logo }}"
                                        alt="">
                                @endif
                            </a>
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
                                            <a href="#" class="has-submenu" id="sm-17005289088241277-3"
                                                aria-haspopup="true" aria-controls="sm-17005289088241277-4"
                                                aria-expanded="false">About Us<span class="sub-arrow"></span></a>
                                            <ul id="sm-17005289088241277-4" role="group" aria-hidden="true"
                                                aria-labelledby="sm-17005289088241277-3" aria-expanded="false">
                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('web-company') }}">Company</a></li>
                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('web-certificates') }}">Certificates</a></li>
                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('web-team') }}">Teams</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ route('web-service') }}">Business Units</a>
                                        </li>
                                        {{-- <li>
                                            <a href="{{ route('web-catalog') }}">Catalog</a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route('web-portfolio') }}">Portfolio</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('web-contact') }}">Contact Us</a>
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
                                    @if (setting_web()->logo != null)
                                        <img style="width: 150px" class="foot_logo"
                                            src="{{ Storage::url('public/uploads/logos/') . setting_web()->logo }}"
                                            alt="">
                                    @endif
                                    <p>our Industrial Instrument, Automation System & Automechatronika needs</p>
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
                                            @php
                                                $categoryproducts = \App\Models\Categoryproduct::all();
                                            @endphp
                                            @foreach ($categoryproducts as $row)
                                                <li><a href="{{ url()->current() . '?category=' . $row->id }}"><i
                                                            class="fa fa-chevron-circle-right"></i>{{ $row->category_name }}</a>
                                                </li>
                                            @endforeach
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
                                        <li><i class="fa fa-whatsapp" aria-hidden="true"></i>WA:
                                            {{ $company->no_whatsapp }}</li>
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

        <div style="position:fixed;right:20px;bottom:20px;">
            <button id="emailButton" style="background:gray;vertical-align:center;height:36px;border-radius:5px">
                <span style="color:white"><i class="fa fa-envelope" aria-hidden="true"></i> <b>Send us a
                        Mail</b></span>
            </button>
        </div>


        <div class="tap-top top-cls top_5">
            <div>
                <i class="fa fa-angle-double-up"></i>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @include('sweetalert::alert')
    <script>
        document.getElementById("emailButton").addEventListener("click", function() {
            var companyEmail = "{{ $company->email }}";
            var mailtoLink = "mailto:" + encodeURIComponent(companyEmail);
            window.location.href = mailtoLink;
        });
    </script>
    @stack('js')
    {{-- <script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
    <script>
        var wa_btnSetting = {
            "btnColor": "#16BE45",
            "ctaText": "WhatsApp Us",
            "cornerRadius": 40,
            "marginBottom": 20,
            "marginLeft": 20,
            "marginRight": 20,
            "btnPosition": "right",
            "whatsAppNumber": "{{ $company->no_whatsapp }}",
            "welcomeMessage": "Hello",
            "zIndex": 999999,
            "btnColorScheme": "light"
        };
        window.onload = () => {
            _waEmbed(wa_btnSetting);
        };
    </script> --}}

</body>

</html>
