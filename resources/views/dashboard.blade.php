@extends('layouts.app')

@section('title', __('Dashboard'))
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard.css') }}">
@endpush
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <center>
                <img style="width: 250px;margin-top:50px" src="{{ asset('landing/assets/images/logo.jfif') }}" class="img-fluid" alt="">
                <br><br>
                <h4> <b>CMS Website {{setting_web()->nama_perusahaan}}</b></h4>
            </center>
        </div>
    </div>
</div>
@endsection
