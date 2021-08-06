<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div
            id="m_ver_menu"
            class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
            data-menu-vertical="true"
            data-menu-scrollable="false" data-menu-dropdown-timeout="500"
    >

        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            {{--  <li class="m-menu__item   {{request()->path() == '/' ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
                    <a href="/" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-diagram"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    Dashboard
                                </span>
                            </span>
                        </span>
                    </a>
                </li>  --}}

            {{--  <li class="m-menu__item   {{request()->path() == '/' ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
                <a href="/users" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-users"></i>
                    <span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Users
							</span>
					    </span>
					</span>
                </a>
            </li>  --}}

            {{--  <li class="m-menu__item   {{request()->path() == '/' ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
                <a href="/all" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-interface-9"></i>
                    <span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								All
							</span>
					    </span>
					</span>
                </a>
            </li>  --}}

            <li class="m-menu__item   {{request()->path() == '/' ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
                <a href="/products/index" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-app"></i>
                    <span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Products
							</span>
						</span>
					</span>
                </a>
            </li>
            <li class="m-menu__item   {{request()->path() == '/' ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
                <a href="/shipment/index" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-app"></i>
                    <span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Tracking Shipment
							</span>
						</span>
					</span>
                </a>
            </li>

            <li class="m-menu__item   {{request()->path() == '/' ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
                <a href="/stock/index" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-open-box"></i>
                    <span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
							 Stock
							</span>
						</span>
					</span>
                </a>
            </li>

        </ul>
    </div>
</div>
