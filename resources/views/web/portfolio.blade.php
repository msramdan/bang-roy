@extends('web.main')

@section('content')
    <div class="bread_crumb" style="
    background-image: url({{asset('landing/assets/images/brad_back.jpg')}});
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
                            <li><strong><i class="fa fa-angle-double-right" aria-hidden="true"></i> Portfolios</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-title">
                        <h2>Portfolios </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="home_1_news blog_page cmn_bg">
        <ul class="plus_decore">
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                @foreach ($portfolios as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="news_sec">
                            <figure class="snip_con">
                                <img src="{{ asset('storage/uploads/photos/' . $row->photo) }}" alt=""
                                    class="img-fluid ">
                            </figure>
                            <div class="text_p">
                                <div class="date_sec">
                                    <div>
                                        @php
                                            $tanggal_string = $row->tanggal;
                                            $data_tanggal = ambilDataTanggal($tanggal_string);
                                        @endphp
                                        <h4>{{ $data_tanggal['tanggal'] }}</h4>
                                        <h6>{{$data_tanggal['bulan']}} {{$data_tanggal['tahun']}}</h6>
                                    </div>
                                </div>
                                <h4>{{ $row->title_portfolio }}</h4>
                                <p>{{ $row->keterangan }}</p>
                                {{-- <h6 class="readmore"><a href="blog-details.html">Read More</a></h6> --}}
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
