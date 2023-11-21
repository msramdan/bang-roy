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
                            <li><strong><i class="fa fa-angle-double-right" aria-hidden="true"></i>Company</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-title">
                        <h2>Company</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="about_us" class="about_us_sec about_page cmn_bg">
        <ul class="plus_decore">
            <li></li>
            <li></li>
        </ul>
        <div class="container about_sec about_sec_4">
            <div class="row">
                <div class="col-12">
                    <div class="con_title">
                        <h2>about us</h2>
                        <h6><span>{{ $company->nama_perusahaan }}</span></h6>
                    </div>
                </div>
                <div class="col-sm-8 mx-auto">
                    <div>
                        <center><img style="width: 250px" src="{{ asset('landing/assets/images/logo.jfif') }}"
                                class="img-fluid" alt="">
                        </center>

                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <div class="about_content">
                            <h4 class="text-center">Your Industrial Instrument, Automation System & Automechatronika needs
                            </h4>
                            <p style="text-align: center; padding-left:50px; padding-right:50px">{{ $company->deskripsi }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 50px">
                <div class="col-12">
                    <div class="con_title">
                        <h2>Visi & Misi</h2>
                        <h6><span>{{ $company->nama_perusahaan }}</span></h6>
                    </div>
                </div>
                <div class="col-sm-8 mx-auto">
                    <div>
                        <img src="assets/images/about-us.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-12">
                    <div class="about_content">
                        <center>
                            <div>
                                <p style="text-align: center; padding-left:50px; padding-right:50px"><span
                                        class="quote_left"><i class="fa fa-quote-left" aria-hidden="true"></i></span>
                                    {{ $vm->visi }}
                                    <span class="quote_right"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                                </p>
                            </div>
                            <div>
                                <p style="text-align: center; padding-left:50px; padding-right:50px"><span
                                        class="quote_left"><i class="fa fa-quote-left" aria-hidden="true"></i></span>
                                    {{ $vm->misi }}
                                    <span class="quote_right"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                                </p>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
