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
                            <li><strong><i class="fa fa-angle-double-right" aria-hidden="true"></i>Business Units</strong>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-title">
                        <h2>Business Units</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="service" class="our_service_2 cmn_bg service_page">
        <ul class="plus_decore">
            <li></li>
            <li></li>
        </ul>

        <div class="container our_service">
            <div class="row">
                {{-- loop --}}
                @foreach ($businesses as $row)
                    <div class="col-lg-4 col-sm-6">
                        <div class="service_our_2">
                            <div>
                                <img src="{{ asset('storage/uploads/photos/' . $row->photo)}}"
                                    class="img-fluid " alt="serviceimage">
                                <div class="service_content">
                                    <div class="service_title">
                                        <h5>{{$row->title_business}}</h5>
                                        <div class="icon_bg">
                                            <div class="center-content">
                                                <img src="https://themes.pixelstrap.com/reno/theme/assets/images/solar/service_icon/6.png"
                                                    class="img-fluid service_icon" alt="serviceimage">
                                            </div>
                                        </div>
                                    </div>
                                    <p>{{$row->keterangan}}</p>
                                    {{-- <a href="#">Read More</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
