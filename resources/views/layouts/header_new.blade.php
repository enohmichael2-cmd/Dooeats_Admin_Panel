<div class="header-pill-container">
    <div class="header-pill">
        
        <!-- Left: Breadcrumbs / Title -->
        <div class="header-left">
            <!-- Mobile Toggle -->
            <div class="mobile-menu-btn" onclick="toggleMobileSidebar()">
                <i class="fa fa-bars"></i>
            </div>

            <h1 class="page-title">
                {{-- Dynamic Title Logic --}}
                @if(Request::is('dashboard'))
                    Dashboard
                @elseif(Request::is('users*'))
                    User Management
                @elseif(Request::is('restaurants*'))
                    Restaurants
                @elseif(Request::is('drivers*'))
                    Driver Management
                @elseif(Request::is('orders*'))
                    Orders
                @elseif(Request::is('foods*'))
                    Food Items
                @elseif(Request::is('payments*'))
                    Payments
                @elseif(Request::is('settings*'))
                    Settings
                @else
                    Admin Panel
                @endif
            </h1>
        </div>

        <!-- Right: Actions -->
        <div class="header-right">
            
            <!-- Search -->
            <div class="header-search">
                <i class="fa fa-search search-icon"></i>
                <input type="text" placeholder="Search..." aria-label="Search">
            </div>

            <!-- Language Selector -->
             <div class="language-pill" id="language_dropdown_box">
                <div class="language-select">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="language-options ml-2">
                    <select class="form-control changeLang text-dark border-0 bg-transparent p-0" id="language_dropdown" style="height: auto; font-size: 13px;">
                    </select>
                </div>
            </div>

            <!-- Notifications -->
            <div class="header-icon-btn" onclick="location.href='{{ route('notification') }}'">
                <i class="fa fa-bell"></i>
                <span class="notification-badge"></span>
            </div>

            <!-- User Dropdown -->
             <div class="dropdown">
                <div class="header-icon-btn profile-pic-container" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #e5e7eb;">
                     <img src="{{ asset('/images/users/user-new.png') }}" alt="user" class="profile-pic" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover;">
                </div>
                <div class="dropdown-menu dropdown-menu-right scale-up glass-card" style="border-radius: 12px; border: 1px solid rgba(0,0,0,0.05); box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    <ul class="dropdown-user list-unstyled mb-0">
                        <li>
                            <div class="dw-user-box p-3 d-flex align-items-center">
                                <div class="u-img mr-3"><img src="{{ asset('/images/users/user-new.png') }}" alt="user" style="width: 40px; height: 40px; border-radius: 50%;"></div>
                                <div class="u-text">
                                    <h4 class="mb-0" style="font-size: 14px; font-weight: 600;">{{  Auth::user()->name }}</h4>
                                    <p class="text-muted mb-2" style="font-size: 12px;">{{ Auth::user()->email }}</p>
                                    <a href="{{ route('users.profile') }}" class="btn btn-rounded btn-danger btn-sm" style="font-size: 10px; padding: 4px 10px;">{{ trans('lang.view_profile') }}</a>
                                </div>
                            </div>
                        </li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li><a href="{{ route('users.profile') }}" class="dropdown-item px-3 py-2"><i class="ti-user mr-2"></i> {!! trans('lang.user_profile') !!}</a></li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item px-3 py-2 text-danger"><i class="fa fa-power-off mr-2"></i> {{ __('Logout') }}</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
