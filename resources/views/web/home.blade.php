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
                                        <option value="all">All Category</option>
                                        @foreach ($categoryproducts as $row)
                                            <option value="cleaner">{{ $row->category_name }}</option>
                                        @endforeach
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
                                @foreach ($categoryproducts as $row)
                                    <li><a href="#"><i class="fa fa-circle-o"
                                                aria-hidden="true"></i>{{ $row->category_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
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
                                            @foreach ($testimonies as $row)
                                                <div class="testimonial_sec">
                                                    <div>
                                                        <img src="{{ asset('storage/uploads/photos/' . $row->photo) }}"
                                                            alt="testimonialimage">
                                                        <p>
                                                            <span class="quote_left">
                                                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                            </span>
                                                            {{ $row->deskripsi_testimony }}
                                                            <span class="quote_right">
                                                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                                                            </span>
                                                        </p>
                                                        <h3>{{ $row->nama_user }}</h3>
                                                        <h5>{{ $row->jabatan }}</h5>
                                                    </div>
                                                </div>
                                            @endforeach
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
                    <div class="home-slider slider-ecommerce">
                        <div class="slide_1 owl-carousel owl-theme">
                            @foreach ($banners as $row)
                                <div>
                                    <img src="{{ asset('storage/uploads/banners/' . $row->banner) }}" class="bg-img">
                                    <div class="slider_content">
                                        <div>
                                            <h1 data-animation-in="slideInDown" data-animation-out="animate-out slideOutUp">
                                                <span class="sec_one">{{ $row->title }} </span>
                                            </h1>
                                            <h5 data-animation-in="slideInRight" data-animation-out="animate-out fadeOut">
                                                {{ $row->deksripsi }} </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <section class="product_sec pb-0">
                        <div class="collection-product-wrapper">
                            <div class="row product-wrapper-grid f_product">
                                <div class="col-12">
                                    <div class="title">
                                        <h2>Catalog Products</h2>
                                    </div>
                                </div>
                                <div class="collection-product-wrapper">
                                    <div class="product-wrapper-grid">
                                        <div class="row">
                                            <div class="col-md-4 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="#"><img src="assets/images/pro/1.jpg" class="img-fluid" alt=""></a>
                                                            <div>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" class="add_hover add_search" title="Quick View"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                                <a href="#" title="Wish list" class="add_hover add_wish"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                <a href="#" title="Add to cart" class="add_hover"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div>
                                                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Slim Fit Cotton Shirt</h6></a>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                                                            <h4>$500.00</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="#"><img src="assets/images/pro/3.jpg" class="img-fluid" alt=""></a>
                                                            <div>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" class="add_hover add_search" title="Quick View"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                                <a href="#" title="Wish list" class="add_hover add_wish"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                <a href="#" title="Add to cart" class="add_hover"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Slim Fit Cotton Shirt</h6></a>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                                                        <h4>$500.00</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="#"><img src="assets/images/pro/9.jpg" class="img-fluid" alt=""></a>
                                                            <div>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" class="add_hover add_search" title="Quick View"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                                <a href="#" title="Wish list" class="add_hover add_wish"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                <a href="#" title="Add to cart" class="add_hover"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Slim Fit Cotton Shirt</h6></a>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                                                        <h4>$500.00</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="#"><img src="assets/images/pro/11.jpg" class="img-fluid" alt=""></a>
                                                            <div>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" class="add_hover add_search" title="Quick View"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                                <a href="#" title="Wish list" class="add_hover add_wish"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                <a href="#" title="Add to cart" class="add_hover"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Slim Fit Cotton Shirt</h6></a>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                                                        <h4>$500.00</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="#"><img src="assets/images/pro/1.jpg" class="img-fluid" alt=""></a>
                                                            <div>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" class="add_hover add_search" title="Quick View"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                                <a href="#" title="Wish list" class="add_hover add_wish"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                <a href="#" title="Add to cart" class="add_hover"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Slim Fit Cotton Shirt</h6></a>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                                                        <h4>$500.00</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="#"><img src="assets/images/pro/27.jpg" class="img-fluid" alt=""></a>
                                                            <div>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" class="add_hover add_search" title="Quick View"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                                <a href="#" title="Wish list" class="add_hover add_wish"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                <a href="#" title="Add to cart" class="add_hover"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Slim Fit Cotton Shirt</h6></a>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                                                        <h4>$500.00</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="#"><img src="assets/images/pro/1.jpg" class="img-fluid" alt=""></a>
                                                            <div>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" class="add_hover add_search" title="Quick View"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                                <a href="#" title="Wish list" class="add_hover add_wish"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                <a href="#" title="Add to cart" class="add_hover"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Slim Fit Cotton Shirt</h6></a>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                                                        <h4>$500.00</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="#"><img src="assets/images/pro/20.jpg" class="img-fluid" alt=""></a>
                                                            <div>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" class="add_hover add_search" title="Quick View"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                                <a href="#" title="Wish list" class="add_hover add_wish"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                <a href="#" title="Add to cart" class="add_hover"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Slim Fit Cotton Shirt</h6></a>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                                                        <h4>$500.00</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="#"><img src="assets/images/pro/1.jpg" class="img-fluid" alt=""></a>
                                                            <div>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" class="add_hover add_search" title="Quick View"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                                <a href="#" title="Wish list" class="add_hover add_wish"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                <a href="#" title="Add to cart" class="add_hover"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <a></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Slim Fit Cotton Shirt</h6></a>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                                                        <h4>$500.00</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- pagination Start -->
                                </div>



                            </div>
                        </div>
                    </section>
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
                                        @foreach ($clients as $row)
                                            <div class="item">
                                                <img src="{{ asset('storage/uploads/logos/' . $row->logo) }}"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
