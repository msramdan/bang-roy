@extends('web.main')

@section('content')
    <div>
        <div class="bottom-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 ecommerce-sidebar set-order-2">
                        <button class="btn btn-block btn_inverse toggle-btn">
                            <i class="fa fa-bars"></i>Products by category
                        </button>
                    </div>
                    <div class="col-md-9 set-order-1">
                        <form class="ecommerce-from">
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"
                                    placeholder="Search Products...">
                                <div class="input-group-append selective">
                                    <select name="collection" id="collection-option" data-option="collection-option"
                                        class="single-option-selector">
                                        <option value="all">All Collection</option>
                                        <option value="cleaner">Cleaner</option>
                                        <option value="electronics">Electronics</option>
                                        <option value="fashion">Fashion</option>
                                        <option value="grocery">Grocery</option>
                                        <option value="plumbing">Plumbing</option>
                                        <option value="sports">Sports</option>
                                        <option value="tools">tools</option>
                                    </select>
                                </div>
                                <div class="input-group-append">
                                    <a class="btn btn_inverse" href="#"> Search <i class="fa fa-search"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="container">
            <div class="row">
                <!-- sidebar Section Start -->
                <div class="col-lg-3 sidebar ecommerce-sidebar">
                    <div class="theme-card hanger">
                        <div class="stiky angle-b-left"></div>
                        <div class="stiky angle-b-right"></div>
                        <div class="collection-filter-block cat-block">
                            <ul>
                                <li><a href="javascript:void(0)"><i class="ti-brush-alt"></i>Clothes & PPE</a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="ti-briefcase"></i>Power tools</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-ruler-alt-2"></i>Mesurment</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-bag"></i>Machine tools</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-package"></i>Storage &
                                        Organization</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-ruler-pencil"></i>Hand tools</a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="ti-paint-roller"></i> Coloring </a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="ti-control-pause"></i>Plumbing</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-shield"></i> Welding & Soldering
                                    </a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12 col-sm-6">
                            <div class="theme-card">
                                <h5 class="title-border">New Product</h5>
                                <div class="offer-slider small_slider collection-filter-block owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/3.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/3.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/3.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- side-bar single product slider start -->
                        <div class="col-md-12 col-sm-6">
                            <div class="theme-card">
                                <h5 class="title-border">Recently Viewed</h5>
                                <div class="offer-slider small_slider collection-filter-block owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/3.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/3.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media d-flex">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('landing') }}/assets/images/ecommerce/Product/3.jpg"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page.html">
                                                    <h6>Slim Fit Cotton</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->

                        <div class="col-md-12 col-6 set-order-md-5 mb-3">
                            <div class="side-banner">
                                <img src="{{ asset('landing') }}/assets/images/ecommerce/Side-banner/2.png"
                                    class="bg-img bg-bottom" alt="">
                                <div class="side-banner-text">
                                    <h6>Discount Offer</h6>
                                    <h4>Newest tools</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-6 mb-3">
                            <div class="side-banner">
                                <img src="{{ asset('landing') }}/assets/images/ecommerce/Side-banner/1.png"
                                    class="bg-img bg-bottom" alt="">
                                <div class="side-banner-text">
                                    <h6>Discount Offer</h6>
                                    <h4>Latest tools</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial Start -->
                    <div class="theme-card ">
                        <h5 class="title-border">Testiminial</h5>
                        <div class="testimonial home_2_testimonial">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="testimonial_slide owl-carousel owl-theme">
                                            <div class="testimonial_sec">
                                                <div>
                                                    <img src="{{ asset('landing') }}/assets/images/testimonial/1.png"
                                                        alt="testimonialimage">
                                                    <p>
                                                        <span class="quote_left">
                                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                        </span>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                                        <span class="quote_right">
                                                            <i class="fa fa-quote-right" aria-hidden="true"></i>
                                                        </span>
                                                    </p>
                                                    <h3>Ethen Mark</h3>
                                                    <h5>Director</h5>
                                                </div>
                                            </div>
                                            <div class="testimonial_sec">
                                                <div>
                                                    <img src="{{ asset('landing') }}/assets/images/testimonial/2.png"
                                                        alt="testimonialimage">
                                                    <p>
                                                        <span class="quote_left">
                                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                        </span>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                                        <span class="quote_right">
                                                            <i class="fa fa-quote-right" aria-hidden="true"></i>
                                                        </span>
                                                    </p>
                                                    <h3>Suzen Desoza</h3>
                                                    <h5>Director</h5>
                                                </div>
                                            </div>
                                            <div class="testimonial_sec">
                                                <div>
                                                    <img src="{{ asset('landing') }}/assets/images/testimonial/3.png"
                                                        alt="testimonialimage">
                                                    <p>
                                                        <span class="quote_left">
                                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                        </span>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore magna.
                                                        <span class="quote_right">
                                                            <i class="fa fa-quote-right" aria-hidden="true"></i>
                                                        </span>
                                                    </p>
                                                    <h3>John Deo</h3>
                                                    <h5>Director</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial End -->

                </div>
                <!-- sidebar Section end -->

                <div class="col-lg-9">
                    <!--  Slider_start  -->
                    <div class="home-slider slider-ecommerce">
                        <div class="slide_1 owl-carousel owl-theme">
                            <div>
                                <img src="{{ asset('landing') }}/assets/images/ecommerce/slider/1.jpg" class="bg-img">
                                <div class="slider_content">
                                    <div>
                                        <h1 data-animation-in="slideInDown" data-animation-out="animate-out slideOutUp">
                                            <span class="sec_one">Best
                                                Machine Tools.</span>
                                        </h1>
                                        <h5 data-animation-in="slideInRight" data-animation-out="animate-out fadeOut">
                                            Lorem Ipsum is simply dummy
                                            text of the printing and typesetting industry. Lorem Ipsum has been the
                                            industry's standard dummy. </h5>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <img src="{{ asset('landing') }}/assets/images/ecommerce/slider/2.jpg" class="bg-img">
                                <div class="slider_content">
                                    <div>
                                        <h1 data-animation-in="slideInDown" data-animation-out="animate-out slideOutUp">
                                            <span class="sec_one">Best
                                                Machine Tools.</span>
                                        </h1>
                                        <h5 data-animation-in="slideInRight" data-animation-out="animate-out fadeOut">
                                            Lorem Ipsum is simply dummy
                                            text of the printing and typesetting industry. Lorem Ipsum has been the
                                            industry's standard dummy. </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  Slider_End  -->

                    <!-- banner sec Start -->
                    <section class="pb-0 banner-section">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="#">
                                    <div class="collection-banner">
                                        <div class="img-part">
                                            <img src="{{ asset('landing') }}/assets/images/ecommerce/banner-1.png"
                                                class="bg-img" alt="">
                                        </div>
                                        <div class="contain-banner">
                                            <div>
                                                <h3>Cutter machine</h3>
                                                <p>plant power cutter machine</p>
                                                <div class="slider_btn theme_btn btn_5">
                                                    buy now
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <a href="#">
                                    <div class="collection-banner">
                                        <div class="img-part">
                                            <img src="{{ asset('landing') }}/assets/images/ecommerce/banner-2.png"
                                                class="bg-img" alt="">
                                        </div>
                                        <div class="contain-banner">
                                            <div>
                                                <h3>brandix</h3>
                                                <p>head drilling machine</p>
                                                <div class="slider_btn theme_btn btn_5">
                                                    buy now
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </section>
                    <!-- banner sec end -->

                    <!-- Product sec Start -->
                    <section class="product_sec pb-0">
                        <div class="collection-product-wrapper">
                            <div class="row product-wrapper-grid f_product">
                                <div class="col-12">
                                    <div class="title">
                                        <h2>Featured Products</h2>
                                    </div>
                                </div>
                                <div class="col position-relative">
                                    <div class="theme-tab">
                                        <ul class="tabs tab-title">
                                            <li class="current"><a href="tab-1">New Products</a></li>
                                            <li class=""><a href="tab-2">Featured Products</a></li>
                                            <li class=""><a href="tab-3">Best Sellers</a></li>
                                        </ul>
                                        <div class="tab-content-cls">
                                            <div id="tab-1" class="tab-content active default">
                                                <div class="product-5 product-m no-arrow">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/3.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/4.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/5.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tab-2" class="tab-content">
                                                <div class="product-5 product-m no-arrow">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/5.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/3.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/4.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tab-3" class="tab-content">
                                                <div class="product-5 product-m no-arrow">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/5.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/3.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/4.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img
                                                                        src="{{ asset('landing') }}/assets/images/ecommerce/Product/5.jpg"
                                                                        class="img-fluid" alt=""></a>
                                                                <div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        class="add_hover add_search" title="Quick View">
                                                                        <i class="ti-search" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#" title="Wish list"
                                                                        class="add_hover add_wish"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#" title="Add to cart"
                                                                        class="add_hover"><i class="ti-shopping-cart"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <a href="product-page.html">
                                                                <h6>Slim Fit Cotton</h6>
                                                            </a>
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the
                                                                industry's standard dummy text ever since the 1500s,
                                                                when an unknown printer took a galley of type and
                                                                scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Product sec End -->

                    <!-- Product details Start -->
                    <section class=" pb-0">
                        <div class="border-theme add-banner br-5 main-title">
                            <div class="title">
                                <h2>Exclusive Collections</h2>
                            </div>
                            <div>
                                <div class="vert-midd theme-slider">
                                    <div class="inner-slide">
                                        <div class="media d-flex">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href=""><img
                                                            src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                            alt="product" class="img-fluid"></a>
                                                    <div>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#quick-view" class="add_hover add_search"
                                                            title="Quick View" tabindex="0">
                                                            <i class="ti-search" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="#" title="Wish list" class="add_hover add_wish"
                                                            tabindex="0"><i class="ti-heart"
                                                                aria-hidden="true"></i></a>
                                                        <a href="#" title="Add to cart" class="add_hover"
                                                            tabindex="0"><i class="ti-shopping-cart"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="timer-product-desc">
                                                    <div class="product-info">
                                                        <a href="#">
                                                            <h6 class="mb-3">lorem ipsum</h6>
                                                        </a>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <p class="pro-desc">long established fact that a reader
                                                            will be distracted by the readable content of a page
                                                            when looking at its layout. </p>
                                                        <div class="prices">
                                                            <h4 class="pro-price">$125.00</h4>
                                                            <h4 class="pro-price-del"><del>$459.00</del></h4>
                                                        </div>
                                                        <a class="slider_btn theme_btn btn_5"
                                                            data-animation-in="slideInUp"
                                                            data-animation-out="animate-out slideOutDown"
                                                            href="#">
                                                            Shop Now
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner-slide">
                                        <div class="media d-flex">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href=""><img
                                                            src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                            alt="product" class="img-fluid"></a>
                                                    <div>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#quick-view" class="add_hover add_search"
                                                            title="Quick View" tabindex="0">
                                                            <i class="ti-search" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="#" title="Wish list" class="add_hover add_wish"
                                                            tabindex="0"><i class="ti-heart"
                                                                aria-hidden="true"></i></a>
                                                        <a href="#" title="Add to cart" class="add_hover"
                                                            tabindex="0"><i class="ti-shopping-cart"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="timer-product-desc">
                                                    <div class="product-info">
                                                        <a href="#">
                                                            <h6 class="mb-3">lorem ipsum</h6>
                                                        </a>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <p class="pro-desc">long established fact that a reader
                                                            will be distracted by the readable content of a page
                                                            when looking at its layout.</p>
                                                        <div class="prices">
                                                            <h4 class="pro-price">$125.00</h4>
                                                            <h4 class="pro-price-del"><del>$459.00</del></h4>
                                                        </div>
                                                        <a class="slider_btn theme_btn btn_5"
                                                            data-animation-in="slideInUp"
                                                            data-animation-out="animate-out slideOutDown"
                                                            href="#">Shop Now

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner-slide">
                                        <div class="media d-flex">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href=""><img
                                                            src="{{ asset('landing') }}/assets/images/ecommerce/Product/3.jpg"
                                                            alt="product" class="img-fluid"></a>
                                                    <div>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#quick-view" class="add_hover add_search"
                                                            title="Quick View" tabindex="0">
                                                            <i class="ti-search" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="#" title="Wish list" class="add_hover add_wish"
                                                            tabindex="0"><i class="ti-heart"
                                                                aria-hidden="true"></i></a>
                                                        <a href="#" title="Add to cart" class="add_hover"
                                                            tabindex="0"><i class="ti-shopping-cart"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="timer-product-desc">
                                                    <div class="product-info">
                                                        <a href="#">
                                                            <h6 class="mb-3">lorem ipsum</h6>
                                                        </a>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <p class="pro-desc">long established fact that a reader
                                                            will be distracted by the readable content of a page
                                                            when looking at its layout. </p>
                                                        <div class="prices">
                                                            <h4 class="pro-price">$125.00</h4>
                                                            <h4 class="pro-price-del"><del>$459.00</del></h4>
                                                        </div>
                                                        <a class="slider_btn theme_btn btn_5"
                                                            data-animation-in="slideInUp"
                                                            data-animation-out="animate-out slideOutDown"
                                                            href="#">Shop Now

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner-slide">
                                        <div class="media d-flex">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href=""><img
                                                            src="{{ asset('landing') }}/assets/images/ecommerce/Product/4.jpg"
                                                            alt="product" class="img-fluid"></a>
                                                    <div>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#quick-view" class="add_hover add_search"
                                                            title="Quick View" tabindex="0">
                                                            <i class="ti-search" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="#" title="Wish list" class="add_hover add_wish"
                                                            tabindex="0"><i class="ti-heart"
                                                                aria-hidden="true"></i></a>
                                                        <a href="#" title="Add to cart" class="add_hover"
                                                            tabindex="0"><i class="ti-shopping-cart"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="timer-product-desc">
                                                    <div class="product-info">
                                                        <a href="#">
                                                            <h6 class="mb-3">lorem ipsum</h6>
                                                        </a>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <p class="pro-desc">
                                                            long established fact that a reader will be distracted
                                                            by the readable content of a page when looking at its
                                                            layout.
                                                        </p>
                                                        <div class="prices">
                                                            <h4 class="pro-price">$125.00</h4>
                                                            <h4 class="pro-price-del"><del>$459.00</del></h4>
                                                        </div>
                                                        <a class="slider_btn theme_btn btn_5"
                                                            data-animation-in="slideInUp"
                                                            data-animation-out="animate-out slideOutDown"
                                                            href="#">Shop Now

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Product details end -->

                    <!-- Featured Products Start -->
                    <section class="home_1_team home_5_team pb-0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="title">
                                        <h2>New arrival</h2>
                                    </div>
                                </div>
                                <div class="col-12 collection-product-wrapper">
                                    <div class="product-five product-m no-arrow  product-wrapper-grid">
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/4.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/5.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/4.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-five product-m no-arrow  product-wrapper-grid">
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/1.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/4.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/5.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/2.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#"><img
                                                                src="{{ asset('landing') }}/assets/images/ecommerce/Product/4.jpg"
                                                                class="img-fluid" alt=""></a>
                                                        <div>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view"
                                                                class="add_hover add_search" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="#" title="Wish list"
                                                                class="add_hover add_wish"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" title="Add to cart" class="add_hover"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page.html">
                                                        <h6>Slim Fit Cotton</h6>
                                                    </a>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen book
                                                    </p>
                                                    <h4>$500.00</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Featured Products End -->



                    <!-- Brand Start -->
                    <section class="brand_sec pt-0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="title">
                                        <h2>Our Client</h2>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="brand_slide_ecommerce owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{ asset('landing') }}/assets/images/ecommerce/brand/1.png"
                                                alt="">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('landing') }}/assets/images/ecommerce/brand/2.png"
                                                alt="">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('landing') }}/assets/images/ecommerce/brand/3.png"
                                                alt="">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('landing') }}/assets/images/ecommerce/brand/4.png"
                                                alt="">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('landing') }}/assets/images/ecommerce/brand/5.png"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Brand End -->

                </div>
            </div>
        </div>
    </div>
@endsection
