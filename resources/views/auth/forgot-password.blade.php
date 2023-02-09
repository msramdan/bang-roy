@extends('layouts.auth')

@section('title', __('Forgot Password'))

@push('css')
    <link rel="stylesheet" href="{{ asset('mazer') }}/css/pages/auth.css">
@endpush

@section('content')
    {{-- =========================== --}}
    <section>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card">

                        <form class="theme-form login-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <center>
                                <img src="{{ asset('assets/logo.png') }}" alt="" style="width: 60%">
                                <h6>{{ __('Enter your email and we\'ll send your a link to reset your password.') }}</h6>

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <ul class="ms-0 mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>
                                                    <p>{{ $error }}</p>
                                                </li>
                                            @endforeach
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </ul>
                                    </div>
                                @endif

                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        {{ session('status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </center>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                                    <input class="form-control" type="email" name="email" required placeholder=""
                                        autocomplete="current-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                </div><a class="link" href="/login">{{ __('Already have an account') }}?</a>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block"
                                    type="submit">{{ __('Send Password Reset Link') }}</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
