    @includeIf('dashboard.layout.header')
	<!-- begin::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

            <!-- begin:: Page -->
            <div class="m-grid m-grid--hor m-grid--root m-page" id="app">

                <!-- BEGIN: Header -->
                <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
                    <div class="m-container m-container--fluid m-container--full-height">
                        <div class="m-stack m-stack--ver m-stack--desktop">

                            <!-- BEGIN: Brand -->
                            <div class="m-stack__item m-brand  m-brand--skin-dark ">
                                <div class="m-stack m-stack--ver m-stack--general">
                                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                        <a href="#" class="m-brand__logo-wrapper" style="text-decoration: none">
                                            <h1 style="background: linear-gradient(90deg, rgba(0,238,255,1) 0%, rgba(9,85,121,1) 100%);
                                            -webkit-background-clip: text;
                                            -webkit-text-fill-color: transparent;">{{ App\Models\Setting::latest()->first()->name ?? "LOGO" }}</h1>
                                        </a>
                                    </div>
                                    <div class="m-stack__item m-stack__item--middle m-brand__tools">

                                        <!-- BEGIN: Left Aside Minimize Toggle -->
                                        <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                                            <span></span>
                                        </a>

                                        <!-- END -->

                                        <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                            <span></span>
                                        </a>

                                        <!-- END -->

                                        <!-- BEGIN: Responsive Header Menu Toggler -->
                                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                            <span></span>
                                        </a>

                                        <!-- END -->

                                        <!-- BEGIN: Topbar Toggler -->
                                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                            <i class="flaticon-more"></i>
                                        </a>

                                        <!-- BEGIN: Topbar Toggler -->
                                    </div>
                                </div>
                            </div>

                            <!-- END: Brand -->
                            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

                                <!-- BEGIN: Topbar -->
                                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                                    <div class="m-stack__item m-topbar__nav-wrapper">
                                        <ul class="m-topbar__nav m-nav m-nav--inline">
                                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                             m-dropdown-toggle="click">
                                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                                    <span class="m-topbar__userpic">
                                                        <img src="{{ asset('dashboards/assets/app/media/img/users/user4.jpg') }}" class="m--img-rounded m--marginless" alt="" />
                                                    </span>
                                                    <span class="m-topbar__username m--hide">Nick</span>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__header m--align-center" style="background: url({{ asset('dashboards/assets/app/media/img/misc/user_profile_bg.jpg')}}); background-size: cover;">
                                                            <div class="m-card-user m-card-user--skin-dark">
                                                                <div class="m-card-user__pic">
                                                                    <img src="{{ asset('dashboards/assets/app/media/img/users/user4.jpg') }}" class="m--img-rounded m--marginless" alt="" />
                                                                </div>
                                                                <div class="m-card-user__details">
                                                                    <span class="m-card-user__name m--font-weight-500">{{ auth('admin')->user()->name }}</span>
                                                                    <span class="m-card-user__name m--font-weight-300">({{ auth('admin')->user()->getRoleNames()->first() }})</span>
                                                                    <span class="m-card-user__name m--font-weight-300">{{ __('profile.language') }}: {{ app()->getLocale() == 'en' ? 'English' : 'العربية' }}</span>
                                                                    <a href="" class="m-card-user__email m--font-weight-300 m-link">{{ auth('admin')->user()->email }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav m-nav--skin-light">
                                                                    <li class="m-nav__section m--hide">
                                                                        <span class="m-nav__section-text">Section</span>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="{{ route('admin.profile') }}" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                            <span class="m-nav__link-title">
                                                                                <span class="m-nav__link-wrap">
                                                                                    <span class="m-nav__link-text">{{ __('profile.my_profile') }}</span>
                                                                                    {{-- <span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span> --}}
                                                                                </span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    {{-- <li class="m-nav__item">
                                                                        <a href="header/profile.html" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                            <span class="m-nav__link-text">Messages</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__separator m-nav__separator--fit">
                                                                    </li> --}}
                                                                    <li class="m-nav__separator m-nav__separator--fit">
                                                                    </li>
                                                                    <li>
                                                                        <a class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" href="{{ route('logout') }}"
                                                                            onclick="event.preventDefault();
                                                                                            document.getElementById('logout-form').submit();">
                                                                            {{ __('profile.logout') }}
                                                                        </a>
                                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                            @csrf
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                             m-dropdown-toggle="click">
                                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                                    <span class="m-topbar__userpic">
                                                        <img src="{{ app()->getLocale() == 'en' ? asset('dashboards/assets/app/media/img/flags/012-uk.svg') : asset('dashboards/assets/app/media/img/flags/008-saudi-arabia.svg') }}" width="75" class="m--img-rounded m--marginless" alt="" />
                                                    </span>
                                                </a>
                                                <div class="m-dropdown__wrapper" style="width: 140px; padding-top: 4px;">
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__body" style="padding: 10px">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav m-nav--skin-light">
                                                                    <li class="m-nav__item">
                                                                        <a href="{{ route('local.change', ['lang' => 'en']) }}" class="m-nav__link" style="display: inline">
                                                                            <img src="{{ asset('dashboards/assets/app/media/img/flags/012-uk.svg') }}" width="25" class="m--img-rounded m--marginless" alt="" style="margin-right: 10px !important" />
                                                                            <span class="m-nav__link-text" style="display: inherit">English</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item" style="margin-top: 18px">
                                                                        <a href="{{ route('local.change', ['lang' => 'ar']) }}" class="m-nav__link" style="display: inline">
                                                                            <img src="{{ asset('dashboards/assets/app/media/img/flags/008-saudi-arabia.svg') }}" width="25" class="m--img-rounded m--marginless" alt="" style="margin-right: 10px !important" />
                                                                            <span class="m-nav__link-text" style="display: inherit">Arabic</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- END: Topbar -->
                            </div>
                        </div>
                    </div>
                </header>

                <!-- END: Header -->

                <!-- begin::Body -->
                <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

                    <!-- BEGIN: Left Aside -->
                    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
                    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

                        <!-- BEGIN: Aside Menu -->
                        @includeIf('dashboard.layout.navbar')
                        <!-- END: Aside Menu -->
                    </div>

                    <!-- END: Left Aside -->
                    <div class="m-grid__item m-grid__item--fluid m-wrapper">

                        <!-- BEGIN: Subheader -->
                        <div class="m-subheader ">
                            <div class="d-flex align-items-center">
                                <div class="mr-auto">
                                    @yield('subtitle')
                                </div>
                            </div>
                        </div>
                        <div class="m-content">
                            <div class="col-md-12">
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                        {{ session()->get('success') }}
                                    </div>
                                @elseif(session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @yield("content")
                        </div>
                    </div>
                </div>

                <!-- end:: Body -->

                <!-- begin::Footer -->
                <footer class="m-grid__item		m-footer ">
                    <div class="m-container m-container--fluid m-container--full-height m-page__container">
                        <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                            <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                                <span class="m-footer__copyright">
                                    {{ now()->year }} &copy; Made by <a href="#" class="m-link">lami</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </footer>


            <!-- Modal -->
            <div class="modal fade" id="Confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
                            <h4 class="modal-title" id="myModalLabel">@lang('message.are_sure_title')</h4>
                        </div>

                        <div class="modal-body">
                            @lang('message.are_sure')
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('message.cancel')</button>
                            <a class="btn btn-danger">@lang('message.sure')</a>
                        </div>

                    </div>
                </div>
            </div>

                <!-- end::Footer -->
            </div>

            <!-- end:: Page -->

            @includeIf('dashboard.layout.footer')
