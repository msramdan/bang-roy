@extends('web.main')

@section('content')
<div class="bread_crumb">
    <div class="container">
        <div class="row">
            <div class="col-md-6 sec_low">
                <div class="functionalities">
                    <ul id="breadcrumb" class="breadcrumb">
                        <li><a title="Home" href="contraction.html"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                        <li><strong><i class="fa fa-angle-double-right" aria-hidden="true"></i>Teams</strong></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="page-title">
                    <h2>Teams</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="home_1_team team_page cmn_bg">
    <ul class="plus_decore">
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            {{-- start --}}
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="team_sec">
                    <img src="https://themes.pixelstrap.com/reno/theme/assets/images/team/2.jpg" class="img-fluid " alt="serviceimage">
                    <div class="team_details">
                        <div>
                            <h3>Akshara Space</h3>
                            <h5>Founder, CEO</h5>
                            <ul class="social">
                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Google-plus"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pagination -->
</section>
@endsection
