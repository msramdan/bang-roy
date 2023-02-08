<nav>
    <div class="main-navbar">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="mainnav">
            <ul class="nav-menu custom-scrollbar">
                <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                            aria-hidden="true"></i></div>
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
                                        <li class="dropdown"><a class="nav-link menu-title"
                                                href="javascript:void(0)">{!! $menu['icon'] !!}<span>{{ __($menu['title']) }}</span></a>
                                            <ul class="nav-submenu menu-content">
                                                @canany($menu['permissions'])
                                                    @foreach ($menu['submenus'] as $submenu)
                                                        @can($submenu['permission'])
                                                            <li><a
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
                @if (env('APP_ENV') === 'local')
                    <li><a class="nav-link menu-title link-nav" href="{{ route('generators.create') }}"><i
                                data-feather="settings"></i><span>{{ __('CRUD Generator') }}</span></a></li>
                @endif
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
</nav>
