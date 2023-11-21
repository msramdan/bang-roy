@extends('web.main')

@section('content')
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
                            <li><strong><i class="fa fa-angle-double-right" aria-hidden="true"></i>Catalog</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-title">
                        <h2>Catalog</h2>
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
            </div>
        </div>
    </section>
@endsection
