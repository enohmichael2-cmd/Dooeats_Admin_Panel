<div class="new-sidebar" id="newSidebar">
    
    <!-- Header / Logo -->
    <div class="sidebar-header">
        <a href="{{ url('/') }}" class="logo-full">
            <img src="{{ asset('/images/logo_web.png') }}" alt="Logo" style="max-height: 40px;">
        </a>
        <a href="{{ url('/') }}" class="logo-icon">
            <img src="{{ asset('images/logo-light-icon.png') }}" alt="Icon" style="max-height: 32px;">
        </a>
        <div class="sidebar-toggle" id="sidebarToggle">
            <i class="fa fa-chevron-left"></i>
        </div>
    </div>

    <!-- Menu Content -->
    <div class="sidebar-content">
        <ul class="nav flex-column">
            
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link-new {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="fa fa-tachometer nav-icon"></i>
                    <span>{{trans('lang.dashboard')}}</span>
                </a>
                <div class="nav-text-tooltip">{{trans('lang.dashboard')}}</div>
            </li>

            <div class="nav-divider"></div>

            <!-- Users -->
            <li class="nav-item">
                <a href="{{ route('users') }}" class="nav-link-new {{ Request::is('users*') ? 'active' : '' }}">
                    <i class="fa fa-users nav-icon"></i>
                    <span>{{trans('lang.user_plural')}}</span>
                </a>
                <div class="nav-text-tooltip">{{trans('lang.user_plural')}}</div>
            </li>

            <!-- Restaurants / Vendors -->
            <li class="nav-item">
                <a href="{{ route('restaurants') }}" class="nav-link-new {{ Request::is('restaurants*') ? 'active' : '' }}">
                    <i class="fa fa-cutlery nav-icon"></i>
                    <span>{{trans('lang.restaurant_plural')}}</span>
                </a>
                <div class="nav-text-tooltip">{{trans('lang.restaurant_plural')}}</div>
            </li>

             <!-- Drivers -->
             <li class="nav-item">
                <a href="{{ route('drivers') }}" class="nav-link-new {{ Request::is('drivers*') ? 'active' : '' }}">
                    <i class="fa fa-car nav-icon"></i>
                    <span>{{trans('lang.driver_plural')}}</span>
                </a>
                <div class="nav-text-tooltip">{{trans('lang.driver_plural')}}</div>
            </li>

            <!-- Orders -->
            <li class="nav-item">
                <a href="{{ route('orders') }}" class="nav-link-new {{ Request::is('orders*') ? 'active' : '' }}">
                    <i class="fa fa-shopping-cart nav-icon"></i>
                    <span>{{trans('lang.order_plural')}}</span>
                </a>
                <div class="nav-text-tooltip">{{trans('lang.order_plural')}}</div>
            </li>

            <!-- Categories -->
            <li class="nav-item">
                <a href="{{ route('categories') }}" class="nav-link-new {{ Request::is('categories*') ? 'active' : '' }}">
                    <i class="fa fa-list-alt nav-icon"></i>
                    <span>{{trans('lang.category_plural')}}</span>
                </a>
                <div class="nav-text-tooltip">{{trans('lang.category_plural')}}</div>
            </li>

            <!-- Foods -->
            <li class="nav-item">
                <a href="{{ route('foods') }}" class="nav-link-new {{ Request::is('foods*') ? 'active' : '' }}">
                    <i class="fa fa-cutlery nav-icon"></i>
                    <span>{{trans('lang.food_plural')}}</span>
                </a>
                <div class="nav-text-tooltip">{{trans('lang.food_plural')}}</div>
            </li>

            <!-- Payments (Nested) -->
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link-new has-arrow {{ Request::is('payments*') || Request::is('payoutRequests*') ? 'active' : '' }}" onclick="toggleSubmenu(this)">
                    <i class="fa fa-credit-card nav-icon"></i>
                    <span>{{trans('lang.payment_plural')}}</span>
                    <i class="fa fa-chevron-down ml-auto nav-arrow"></i>
                </a>
                <div class="nav-text-tooltip">{{trans('lang.payment_plural')}}</div>
                <ul class="submenu {{ Request::is('payments*') || Request::is('payoutRequests*') ? 'open' : '' }}">
                    <li>
                        <a href="{{ route('payments') }}" class="nav-link-new {{ Request::is('payments') ? 'active' : '' }}">
                            {{trans('lang.payment_plural')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('restaurantsPayouts') }}" class="nav-link-new {{ Request::is('restaurantsPayouts*') ? 'active' : '' }}">
                            {{trans('lang.restaurants_payout_plural')}}
                        </a>
                    </li>
                     <li>
                        <a href="{{ route('driversPayouts') }}" class="nav-link-new {{ Request::is('driversPayouts*') ? 'active' : '' }}">
                            {{trans('lang.drivers_payout_plural')}}
                        </a>
                    </li>
                     <li>
                        <a href="{{ route('walletstransaction') }}" class="nav-link-new {{ Request::is('walletstransaction*') ? 'active' : '' }}">
                            {{trans('lang.wallet_transaction_plural')}}
                        </a>
                    </li>
                </ul>
            </li>

             <!-- Documents -->
             <li class="nav-item">
                <a href="{{ route('documents') }}" class="nav-link-new {{ Request::is('documents*') ? 'active' : '' }}">
                    <i class="fa fa-file-text nav-icon"></i>
                    <span>{{trans('lang.document_plural')}}</span>
                </a>
                <div class="nav-text-tooltip">{{trans('lang.document_plural')}}</div>
            </li>

             <!-- Settings (Nested) -->
             <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link-new has-arrow {{ Request::is('settings*') ? 'active' : '' }}" onclick="toggleSubmenu(this)">
                    <i class="fa fa-cogs nav-icon"></i>
                    <span>{{trans('lang.app_setting')}}</span>
                    <i class="fa fa-chevron-down ml-auto nav-arrow"></i>
                </a>
                <div class="nav-text-tooltip">{{trans('lang.app_setting')}}</div>
                <ul class="submenu {{ Request::is('settings*') ? 'open' : '' }}">
                    <li>
                        <a href="{{ url('settings/app/globals') }}" class="nav-link-new">
                           {{trans('lang.app_setting_globals')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('settings/currencies') }}" class="nav-link-new">
                           {{trans('lang.currency_plural')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('settings/payment/paystack') }}" class="nav-link-new">
                           {{trans('lang.app_setting_payment')}}
                        </a>
                    </li>
                     <li>
                        <a href="{{ url('settings/app/adminCommission') }}" class="nav-link-new">
                          Admin Commission
                        </a>
                    </li>
                     <li>
                        <a href="{{ url('settings/app/languages') }}" class="nav-link-new">
                          {{trans('lang.languages')}}
                        </a>
                    </li>
                </ul>
            </li>


        </ul>
        
        <!-- Logout Section -->
        <div class="logout-section">
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="nav-link-new nav-link-logout">
                <i class="fa fa-power-off nav-icon"></i>
                <span>{{ __('Logout') }}</span>
            </a>
            <div class="nav-text-tooltip">{{ __('Logout') }}</div>
        </div>
    </div>

    <!-- User Profile Footer -->
    <div class="sidebar-footer">
        <a href="{{ route('users.profile') }}" class="user-profile text-decoration-none">
            <img src="{{ asset('/images/users/user-new.png') }}" class="user-avatar" alt="User">
            <div class="user-info">
                <h6>{{ Auth::user()->name }}</h6>
                <p>{{ session()->has('user_role') ? session()->get('user_role') : 'Admin' }}</p>
            </div>
        </a>
    </div>

</div>

<!-- Overlay for Mobile -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleMobileSidebar()"></div>

<script>
    // Simple state management
    const sidebar = document.getElementById('newSidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const overlay = document.getElementById('sidebarOverlay');
    const body = document.body;
    
    // Load state
    const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
    if (isCollapsed && window.innerWidth > 1024) {
        sidebar.classList.add('collapsed');
    }

    // Toggle Function
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed'));
    });

    // Submenu Toggle
    window.toggleSubmenu = function(el) {
        if (sidebar.classList.contains('collapsed')) {
             // If collapsed, clicking header should probably expand sidebar first or show floating menu
             // For now, let's expand sidebar if user tries to interact with submenu
             sidebar.classList.remove('collapsed');
             localStorage.setItem('sidebar-collapsed', false);
        }
        const submenu = el.nextElementSibling;
        const arrow = el.querySelector('.nav-arrow');
        
        if (submenu) {
            submenu.classList.toggle('open');
            if (arrow) {
                arrow.style.transform = submenu.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0deg)';
                arrow.style.transition = 'transform 0.2s';
            }
        }
    }
    
    // Mobile Toggle
    window.toggleMobileSidebar = function() {
        sidebar.classList.toggle('mobile-open');
        overlay.classList.toggle('show');
    }

    // Auto-collapse on smaller screens on load
    if (window.innerWidth <= 1024) {
        sidebar.classList.add('collapsed');
    }
</script>
