<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body>
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <div class="page-wrapper" id="pageWrapper">
        <div class="page-main-header">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid"
                                src="{{ asset('assets/logo.png') }}" alt=""></a></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center"
                            id="sidebar-toggle"></i></div>
                </div>
                <div class="nav-right col pull-right right-menu p-0">
                    <ul class="nav-menus">
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a></li>
                        <li class="onhover-dropdown p-0">
                            <button class="btn btn-primary-light" type="button"><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                        data-feather="log-out"></i>Log out</a></button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
        <div class="page-body-wrapper horizontal-menu">
            <header class="main-nav">
                {{-- profile --}}
                <div class="sidebar-user text-center"><a class="setting-primary" href="{{ route('profile') }}"><i
                            data-feather="settings"></i></a><img class="img-90 rounded-circle"
                        src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(auth()->user()->email))) }}&s=30"
                        alt="">
                    <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a
                        href="{{ route('profile') }}">
                        <h6 class="mt-3 f-14 f-w-600">{{ Auth::user()->name }}</h6>
                    </a>
                    <p class="mb-0 font-roboto">{{ Auth::user()->roles->first()->name }}</p>
                </div>
                {{-- sidebar --}}
                @include('layouts.sidebar')
            </header>
            {{-- content --}}
            @yield('content')
            {{-- footer --}}
            @include('layouts.footer')
        </div>
    </div>
    {{-- script --}}
    @include('layouts.script')


</body>

</html>
