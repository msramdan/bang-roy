@extends('web.main')

@section('content')
    @php
        $company = setting_web();
    @endphp
    <div class="bread_crumb"
        style="
    background-image: url({{ asset('landing/assets/images/brad_back.jpg') }});
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-color: rgba(187, 187, 187, 0.3);
    background-blend-mode: multiply;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 sec_low">
                    <div class="functionalities">
                        <ul id="breadcrumb" class="breadcrumb">
                            <li><a title="Home" href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
                            <li><strong><i class="fa fa-angle-double-right" aria-hidden="true"></i>Certificates</strong>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-title">
                        <h2>Certificates</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="portfolio-section cmn_bg">
        <ul class="plus_decore">
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="col-12">
                <div class="con_title">
                    <h2>our legality</h2>
                    <h6><span>{{ $company->nama_perusahaan }}</span></h6>
                </div>
            </div>

            <div class="row zoom-gallery">
                {{-- loop --}}
                @foreach ($certificates as $row)
                    <div class="isotopeSelector filter fashion col-lg-4 col-sm-6">
                        <div class="overlay">
                            <div class="border-portfolio">
                                <a class="zoom_gallery" href="{{ asset('storage/uploads/images/' . $row->image) }}"
                                    data-source="http://500px.com/photo/32554131">
                                    <div class="overlay-background">
                                        <i class="ti-plus" aria-hidden="true"></i>
                                    </div>
                                    <img src="{{ asset('storage/uploads/images/' . $row->image) }}" class="img-fluid "
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- pagination Start -->
        <!-- pagination End -->
    </section>
@endsection
