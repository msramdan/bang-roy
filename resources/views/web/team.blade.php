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
                            <li><a title="Home" href="contraction.html"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
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
                @foreach ($teams as $row)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="team_sec">
                            <img src="{{ asset('storage/uploads/photos/' . $row->photo) }}" class="img-fluid "
                                alt="serviceimage">
                            <div class="team_details">
                                <div>
                                    <h3>{{ $row->nama }}</h3>
                                    <h5>{{ $row->jabatan }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- pagination -->
    </section>
@endsection
