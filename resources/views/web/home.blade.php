@extends('web.main')

@section('content')

    <style>
        #productList {
            list-style: none;
            padding: 0;
            margin: 0;
            border: none;
            /* Menghilangkan garis batas */
            position: absolute;
            width: 100%;
            background-color: #fff;
            z-index: 1000;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        #productList li {
            display: flex;
            align-items: center;
            padding: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-bottom: 1px solid #eee;
        }

        #productList li:last-child {
            border-bottom: none;
        }

        #productList img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        #productList .product-name {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        #productList .product-name:hover {
            text-decoration: underline;
        }
    </style>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                </div>
                <div class="modal-body" id="productModalBody">
                    <!-- Product details will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
                                <input type="text" class="form-control" id="searchProducts"
                                    aria-label="Amount (to the nearest dollar)" placeholder="Search Products...">
                                <div class="input-group-append">
                                    <a class="btn btn_inverse" href="#"> Search <i class="fa fa-search"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </form>
                        <ul id="productList"></ul>
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
                                    <li>
                                        <a href="{{ url()->current() . '?category=' . $row->id }}">
                                            <i class="fa fa-circle-o" aria-hidden="true"></i>{{ $row->category_name }}
                                        </a>
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
                    <section class="product_sec pt-2">
                        <div class="collection-product-wrapper">
                            <div class="row product-wrapper-grid f_product">
                                <div class="col-12">
                                    <div class="title">
                                        @if (request()->has('category'))
                                            @php
                                                $categoryId = request('category');
                                                $category = \App\Models\Categoryproduct::find($categoryId);
                                            @endphp
                                            <h2 class="d-inline-block">Products By category:
                                                {{ $category ? $category->category_name : 'Unknown Category' }}</h2>
                                            <a href="{{ url('/') }}" class="btn btn-warning btn-sm ml-auto"><i
                                                    class="fa fa-refresh"></i> Reset Filter</a>
                                        @else
                                            <h2>All Products</h2>
                                        @endif
                                    </div>
                                </div>
                                <div class="collection-product-wrapper">
                                    <div class="product-wrapper-grid">
                                        <div class="row">
                                            @if ($products->count() > 0)
                                                @foreach ($products as $product)
                                                    <div class="col-sm-3 col-6">
                                                        <div class="product-box">
                                                            <div class="img-wrapper">
                                                                <div class="front">
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#productModal"
                                                                        data-product-id="{{ $product->id }}">
                                                                        <img src="{{ asset('storage/uploads/photos/' . $product->photo) }}"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="product-detail">
                                                                <div>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star" style="color: orange"></i>
                                                                        <i class="fa fa-star" style="color: orange"></i>
                                                                        <i class="fa fa-star" style="color: orange"></i>
                                                                        <i class="fa fa-star" style="color: orange"></i>
                                                                        <i class="fa fa-star" style="color: orange"></i>
                                                                    </div>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#productModal"
                                                                        data-product-id="{{ $product->id }}">
                                                                        <span
                                                                            style="color: #327555"><b>{{ $product->nama }}</b></span>
                                                                    </a>
                                                                    <h6>{{ rupiah($product->harga) }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="alert alert-warning" role="alert">
                                                    Tidak ada produk yang ditemukan.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            {{ $products->links('web.paggination.custom') }}
                        </center>
                    </section>


                    <section class="brand_sec pt-2">
                        <div class="col-12">
                            <div class="title">
                                <h2>Our Client</h2>
                            </div>
                        </div>
                        <div class="col">
                            <div class="brand_slide_ecommerce owl-carousel owl-theme">
                                @foreach ($clients as $row)
                                    <div class="item">
                                        <img src="{{ asset('storage/uploads/logos/' . $row->logo) }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#productModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var productId = button.data('product-id');

                // Load product details using AJAX
                $.ajax({
                    url: '/get-product-details/' + productId, // Ganti dengan URL yang sesuai
                    type: 'GET',
                    success: function(response) {
                        // Replace the following line with your actual implementation
                        var productDetailsHtml = response; // Assume the server returns HTML

                        $('#productModalBody').html(productDetailsHtml);
                    },
                    error: function(error) {
                        console.log('Error fetching product details:', error);
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            var productList = $('#productList');

            $("#searchProducts").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('search.products') }}",
                        method: "GET",
                        data: {
                            query: request.term
                        },
                        success: function(data) {
                            displayResults(data);
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    // Callback saat item dipilih, bisa diisi dengan aksi yang sesuai
                    console.log("Selected: " + ui.item.nama);
                },
                close: function(event, ui) {
                    // Callback saat hasil ketikan dihapus
                    var query = $("#searchProducts").val();
                    performSearch(query);
                }
            }).on('input', function() {
                // Callback saat nilai input berubah (termasuk saat dihapus)
                var query = $(this).val();
                performSearch(query);
            });

            // Ajax search on button click
            $("#btnSearch").on("click", function() {
                var query = $("#searchProducts").val();
                performSearch(query);
            });

            function performSearch(query) {
                // Bersihkan daftar hasil pencarian jika query kosong
                if (query === '') {
                    productList.empty();
                    return;
                }

                // Lakukan aksi pencarian atau tampilkan hasil pencarian sesuai kebutuhan
                console.log("Performing search for: " + query);
            }

            function displayResults(products) {
                productList.empty();

                if (products.length > 0) {
                    $.each(products, function(index, product) {
                        var listItem = '<li data-product-id="' + product.id + '">';
                        listItem += '<img src="{{ asset('storage/uploads/photos/') }}/' + product.photo +
                            '" alt="' + product.nama + '" class="product-image">';
                        listItem += '<div class="product-details">';
                        listItem += '<p class="product-name">' + product.nama + '</p>';
                        listItem += '</div>';
                        listItem += '</li>';
                        productList.append(listItem);
                    });
                } else {
                    productList.append('<li>No products found</li>');
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // Tangani klik pada item produk dalam daftar pencarian
            $('#productList').on('click', 'li', function() {
                // Periksa apakah data-product-id diatur
                var productId = $(this).data('product-id');
                if (productId === undefined) {
                    console.error('Data-product-id is not set on the clicked element.');
                    return;
                }

                // Load detail produk menggunakan AJAX
                $.ajax({
                    url: '/get-product-details/' + productId, // Ganti dengan URL yang sesuai
                    type: 'GET',
                    success: function(response) {
                        // Pastikan response tidak null
                        if (response) {
                            // Gantilah baris berikut dengan implementasi sesungguhnya
                            var productDetailsHtml =
                            response; // Anggap server mengembalikan HTML

                            // Tampilkan detail produk di dalam modal
                            $('#productModalBody').html(productDetailsHtml);

                            // Buka modal
                            $('#productModal').modal('show');
                        } else {
                            console.log('Product details not found.');
                        }
                    },
                    error: function(error) {
                        console.log('Error fetching product details:', error);
                    }
                });
            });
        });
    </script>
@endpush
