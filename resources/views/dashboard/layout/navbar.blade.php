<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

        {{-- Dashboard Link --}}
        @if (auth('admin')->user()->can('dashboard'))
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <a href="{{ route('dashboard.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">@lang('aside-menu.dashboard')</span>
                        </span>
                    </span>
                </a>
            </li>
        @endif
        <li class="m-menu__section ">
            <h4 class="m-menu__section-text">@lang('aside-menu.featured')</h4>
            <i class="m-menu__section-icon flaticon-more-v2"></i>
        </li>

        @if (auth('admin')->user()->can('notification'))
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <a href="{{ route('notification.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-alarm text-success"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text text-success">@lang('aside-menu.notifications')</span>
                            {{-- <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">2</span></span> --}}
                        </span>
                    </span>
                </a>
            </li>
        @endif

        {{-- Admin Link --}}
        @if (auth('admin')->user()->can('admin_show'))
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><img src="/image/scrum.png" width="30"><span class="m-menu__link-text" style="width: 120px;">@lang('aside-menu.admins')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">@lang('aside-menu.admins')</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.admins')</span></a></li>
                        @if (auth('admin')->user()->can('admin_create'))
                            <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_admin')</span></a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        {{-- User Link --}}
        @if (auth('admin')->user()->can('user_show'))
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><img src="/image/man.png" width="30"><span class="m-menu__link-text" style="width: 120px;">@lang('aside-menu.users')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Users</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('user.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.users')</span></a></li>
                        @if (auth('admin')->user()->can('user_create'))
                            <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('user.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_user')</span></a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        {{-- Category Link --}}
        @if (auth('admin')->user()->can('category_show'))
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><img src="/image/category.png" width="25"><span class="m-menu__link-text" style="width: 120px;">@lang('aside-menu.categories')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Categories</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('category.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.categories')</span></a></li>
                        @if (auth('admin')->user()->can('category_create'))
                            <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('category.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_category')</span></a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        {{-- Slider Link --}}
        @if (auth('admin')->user()->can('slider_show'))
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><img src="/image/picture.png" width="30"><span class="m-menu__link-text" style="width: 120px;">@lang('aside-menu.sliders')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Sliders</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('slider.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.sliders')</span></a></li>
                        @if (auth('admin')->user()->can('category_create'))
                            <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('slider.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_slider')</span></a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        {{-- Color Link --}}
        @if (auth('admin')->user()->can('color_show'))
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><img src="/image/colour.png" width="30"><span class="m-menu__link-text" style="width: 120px;">@lang('aside-menu.colors')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">@lang('aside-menu.colors')</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('color.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.colors')</span></a></li>
                        @if (auth('admin')->user()->can('color_create'))
                            <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('color.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_color')</span></a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        {{-- Size Link --}}
        @if (auth('admin')->user()->can('size_show'))
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><img src="/image/size.png" width="30"><span class="m-menu__link-text" style="width: 120px;">@lang('aside-menu.sizes')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">@lang('aside-menu.sizes')</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('size.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.sizes')</span></a></li>
                        @if (auth('admin')->user()->can('size_create'))
                            <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('size.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_size')</span></a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        {{-- Brand Link --}}
        @if (auth('admin')->user()->can('brand_show'))
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><img src="/image/brand.png" width="30"><span class="m-menu__link-text" style="width: 120px;">@lang('aside-menu.brands')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">@lang('aside-menu.brands')</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('brand.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.brands')</span></a></li>
                        @if (auth('admin')->user()->can('brand_create'))
                            <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('brand.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_brand')</span></a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        {{-- Product Link --}}
        @if (auth('admin')->user()->can('product_show'))
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><img src="/image/box.png" width="30"><span class="m-menu__link-text" style="width: 120px !important;">@lang('aside-menu.products')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">@lang('aside-menu.products')</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('product.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.products')</span></a></li>
                        @if (auth('admin')->user()->can('product_create'))
                            <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('product.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_product')</span></a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        {{-- Coupon Link --}}
        @if (auth('admin')->user()->can('coupon_show'))
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><img src="/image/coupon.png" width="30"><span class="m-menu__link-text" style="width: 120px">@lang('aside-menu.coupons')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">@lang('aside-menu.coupons')</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('coupon.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.coupons')</span></a></li>
                        @if (auth('admin')->user()->can('coupon_create'))
                            <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('coupon.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_coupon')</span></a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        {{-- Order Link --}}
        @if (auth('admin')->user()->can('order_show'))
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <a href="{{ route('order.index') }}" class="m-menu__link ">
                    <img src="/image/cargo.png" width="30">
                    <span class="m-menu__link-title" style="width: 71%">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text text-info">@lang('aside-menu.orders')</span>
                            <span class="m-menu__link-badge"><span class="m-badge m-badge--info" style="font-size: 12px;">{{ App\Models\Order::all()->count() }}</span></span>
                        </span>
                    </span>
                </a>
            </li>
        @endif

        {{-- Role Link --}}
        @if (auth('admin')->user()->can('role_show'))
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><img src="/image/scrum.png" width="30"><span class="m-menu__link-text" style="width: 120px;">@lang('aside-menu.roles')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Roles</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('role.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.roles')</span></a></li>
                        @if (auth('admin')->user()->can('role_create'))
                            <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('role.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_role')</span></a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        {{-- Question Answer Link --}}
        @if (auth('admin')->user()->can('questionAnswer_show'))
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><img src="/image/letter-q.png" width="30"><span class="m-menu__link-text" style="width: 120px;">@lang('aside-menu.questionAnswers')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">QuestionAnswer</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('questionAnswer.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.questionAnswers')</span></a></li>
                        @if (auth('admin')->user()->can('questionAnswer_create'))
                            <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('questionAnswer.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_questionAnswer')</span></a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        {{-- Setting Link --}}
        @if (auth('admin')->user()->can('setting'))
            <li class="m-menu__item " aria-haspopup="true">
                <a href="{{ route('setting.index') }}" class="m-menu__link ">
                    <img src="/image/settings.png" width="30">
                    <span class="m-menu__link-title" style="width: 71%;">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">@lang('aside-menu.setting')</span>
                        </span>
                    </span>
                </a>
            </li>
        @endif

    </ul>
</div>
