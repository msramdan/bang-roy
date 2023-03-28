<nav>
    <div class="main-navbar">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="mainnav">
            <ul class="nav-menu custom-scrollbar">
                <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                            aria-hidden="true"></i></div>
                </li>
                <li><a class="nav-link menu-title link-nav {{ request()->is('/') || request()->is('dashboard') ? ' activee' : '' }}" href="{{ route('dashboard') }}"><i
                            data-feather="home"></i>
                        <span>Dashboard</span></a>
                </li>
                @foreach (config('generator.sidebars') as $sidebar)
                    @if (isset($sidebar['permissions']))
                        @canany($sidebar['permissions'])
                            @foreach ($sidebar['menus'] as $menu)
                                @php
                                    $permissions = empty($menu['permission']) ? $menu['permissions'] : [$menu['permission']];
                                @endphp
                                @canany($permissions)
                                    @if (empty($menu['submenus']))
                                        @can($menu['permission'])
                                            <li><a class="nav-link menu-title link-nav {{ is_active_menu($menu['route']) }}"
                                                    href="{{ route(str($menu['route'])->remove('/')->plural() . '.index') }}">{!! $menu['icon'] !!}<span>{{ __($menu['title']) }}</span></a>
                                            </li>
                                        @endcan
                                    @else
                                        {{-- <li class="dropdown"><a
                                                class="nav-link menu-title {{ is_active_menu($menu['permissions']) }}"
                                                href="javascript:void(0)">{!! $menu['icon'] !!} {{ __($menu['title']) }}</a>
                                            <ul class="nav-submenu menu-content">
                                                @canany($menu['permissions'])
                                                    @foreach ($menu['submenus'] as $submenu)
                                                        @can($submenu['permission'])
                                                            <li><a class="{{ is_active_menu($submenu['route']) }}"
                                                                    href="{{ route(str($submenu['route'])->remove('/')->plural() . '.index') }}">{{ __($submenu['title']) }}</a>
                                                            </li>
                                                        @endcan
                                                    @endforeach
                                                @endcanany
                                            </ul>
                                        </li> --}}


                                        <li class="dropdown"><a
                                                class="nav-link menu-title {{ is_active_menu($menu['permissions']) }}"
                                                href="javascript:void(0)">{!! $menu['icon'] !!} {{ __($menu['title']) }}<div
                                                    class="according-menu"><i class="fa fa-angle-right"></i>
                                                </div></a>
                                            <ul class="nav-submenu menu-content">
                                                @canany($menu['permissions'])
                                                    @foreach ($menu['submenus'] as $submenu)
                                                        @can($submenu['permission'])
                                                            <li><a class="{{ is_active_menu($submenu['route']) }}"
                                                                    href="{{ route(str($submenu['route'])->remove('/')->plural() . '.index') }}">{{ __($submenu['title']) }}</a>
                                                            </li>
                                                        @endcan
                                                    @endforeach
                                                @endcanany
                                            </ul>
                                        </li>
                                    @endif
                                @endcanany
                            @endforeach
                        @endcanany
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
</nav>
