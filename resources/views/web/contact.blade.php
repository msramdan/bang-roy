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
                            <li><strong><i class="fa fa-angle-double-right" aria-hidden="true"></i> CONTACT US</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-title">
                        <h2>CONTACT US</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section cmn_bg">
        <ul class="plus_decore">
            <li></li>
            <li></li>
        </ul>
        <!-- leave comment sectopn starts-->
        <div class="comment_form contact_form contect_f">
            <div class="text-xl-left">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 contact_text">
                            <div class="angle angle-left"></div>
                            <h3 class="title">Contact Us</h3>
                            <p>If you have any questions, just fill in the contact form, and we will answer you shortly. If
                                you are living nearby, come visit Intense in one of our comfortable offices.</p>
                            <div class="contect_info">
                                <div class="contect-title">
                                    <h3 class="title">Information</h3>
                                </div>
                                <div class="contant-text">
                                    <ul>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $company->alamat }}</li>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: {{ $company->telepon }}
                                        </li>
                                        <li><i class="fa fa-whatsapp" aria-hidden="true"></i>WA:
                                            {{ $company->no_whatsapp }}</li>
                                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i>Email Us:
                                            {{ $company->email }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- leave comment sectopn starts-->
                        <div class="col-lg-8 center">
                            <div class="angle angle-right"></div>
                            <div class="quote_2 comment_form_sec">
                                <div class="container bg-transparent">
                                    <div class="row">
                                        <div class="col-12 quote_form">
                                            <h3 class="page-header-comment mb-4">Leave you comment :</h3>
                                            <form action="{{route('web-submit-contact')}}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <div class="form-row row g-3">
                                                    <div class="form-group col-md-6">
                                                        <label>Name :</label>
                                                        <input type="text" name="name" class="form-control" id="name"
                                                            placeholder="Enter Your Name" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Email :</label>
                                                        <input type="email" name="email" class="form-control" id="email"
                                                            placeholder="Enter Your Email" required="">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="exampleTextarea">Message :</label>
                                                        <textarea class="form-control msg_coment" name="message" id="message" rows="3" placeholder="Leave a Comment"
                                                            required=""></textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="quote_btn theme_btn">Send Your Message
                                                    <span class="theme_btn_eff"></span></button>
                                            </form>
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
@endsection
