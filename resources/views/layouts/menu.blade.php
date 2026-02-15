@php
    $user = Auth::user();
    $role_has_permission = App\Models\Permission::where('role_id', $user->role_id)->pluck('permission')->toArray();
@endphp

<!-- Sidebar Header/Logo Area -->
<div class="sidebar-header">
    <div class="sidebar-logo">
        <i class="mdi mdi-food-fork-drink"></i>
        <span class="logo-text">{{ trans('lang.admin_panel') }}</span>
    </div>
</div>

<!-- Enhanced Search -->
<div class="sidebar-search glass-search">
    <div style="position: relative;">
        <i class="fa fa-search search-icon" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-muted); font-size: 14px; transition: color var(--transition);"></i>
        <input type="text" id="sideBarSearchInput" placeholder="Search menu..." autocomplete="off" onkeyup="filterMenu()" class="search-input">
    </div>
</div>

<!-- Main Navigation -->
<nav class="sidebar-nav glass-nav">
    <ul id="sidebarnav" class="menu-list">
        
        <!-- Dashboard -->
        <li class="menu-item">
            <a class="menu-link waves-effect waves-dark" href="{!! url('dashboard') !!}" aria-expanded="false">
                <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                <span class="menu-text">{{ trans('lang.dashboard') }}</span>
            </a>
        </li>

        <!-- Live Monitoring Section -->
        @if (in_array('god-eye', $role_has_permission) || in_array('zone', $role_has_permission))
            <li class="menu-section">
                <span class="menu-section-title">{{ trans('lang.live_monitoring') }}</span>
            </li>
        @endif
        @if (in_array('god-eye', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('map') !!}" aria-expanded="false">
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.god_eye') }}</span>
                </a>
            </li>
        @endif
        @if (in_array('zone', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('zone') !!}" aria-expanded="false">
                    <i class="mdi mdi-map-marker-radius menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.zone') }}</span>
                </a>
            </li>
        @endif

        <!-- Access Management Section -->
        @if (in_array('admins', $role_has_permission) || in_array('roles', $role_has_permission))
            <li class="menu-section">
                <span class="menu-section-title">{{ trans('lang.access_management') }}</span>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                    <i class="mdi mdi-shield-account menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.access_control') }}</span>
                    <span class="submenu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="submenu collapse" aria-expanded="false">
                    @if (in_array('roles', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('role') !!}">
                            <i class="mdi mdi-account-key submenu-icon"></i>{{ trans('lang.role_plural') }}</a></li>
                    @endif
                    @if (in_array('admins', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('admin-users') !!}">
                            <i class="mdi mdi-account-group submenu-icon"></i>{{ trans('lang.admin_plural') }}</a></li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- Customer & Vendor Management Section -->
        @if (in_array('users', $role_has_permission) || in_array('vendors', $role_has_permission) || in_array('approve_vendors', $role_has_permission) || in_array('pending_vendors', $role_has_permission))
            <li class="menu-section">
                <span class="menu-section-title">{{ trans('lang.customer_and_vendor_management') }}</span>
            </li>
        @endif
        @if (in_array('users', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('users') !!}" aria-expanded="false">
                    <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.user_customer') }}</span>
                </a>
            </li>
        @endif
        @if (in_array('vendors', $role_has_permission) || in_array('approve_vendors', $role_has_permission) || in_array('pending_vendors', $role_has_permission))
            <li class="menu-item has-submenu">
                <a class="menu-link has-arrow waves-effect waves-dark driver_menu" href="#" aria-expanded="false">
                    <i class="mdi mdi-storefront menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.owner_vendor') }}</span>
                    <span class="submenu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="submenu collapse driver_sub_menu" aria-expanded="false">
                    @if (in_array('vendors', $role_has_permission))
                        <li class="submenu-item all_driver_menu"><a href="{!! url('vendors') !!}">
                            <i class="mdi mdi-store submenu-icon"></i>{{ trans('lang.all_vendors') }}</a></li>
                    @endif
                    @if (in_array('approve_vendors', $role_has_permission))
                        <li class="submenu-item approve_driver_menu"><a href="{!! url('vendors/approved') !!}">
                            <i class="mdi mdi-check-circle submenu-icon"></i>{{ trans('lang.approved_vendors') }}</a></li>
                    @endif
                    @if (in_array('pending_vendors', $role_has_permission))
                        <li class="submenu-item pending_driver_menu"><a href="{!! url('vendors/pending') !!}">
                            <i class="mdi mdi-clock-outline submenu-icon"></i>{{ trans('lang.approval_pending_vendors') }}</a></li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- Restaurant & Driver Management Section -->
        @if (in_array('drivers', $role_has_permission) || in_array('approve_drivers', $role_has_permission) || in_array('pending_drivers', $role_has_permission) || in_array('restaurants', $role_has_permission))
            <li class="menu-section">
                <span class="menu-section-title">{{ trans('lang.restaurant_and_driver_management') }}</span>
            </li>
        @endif
        @if (in_array('restaurants', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('restaurants') !!}" aria-expanded="false">
                    <i class="mdi mdi-silverware-fork-knife menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.restaurant_plural') }}</span>
                </a>
            </li>
        @endif
        @if (in_array('drivers', $role_has_permission) || in_array('approve_drivers', $role_has_permission) || in_array('pending_drivers', $role_has_permission))
            <li class="menu-item has-submenu">
                <a class="menu-link has-arrow waves-effect waves-dark driver_menu" href="#" aria-expanded="false">
                    <i class="mdi mdi-car-connected menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.driver_plural') }}</span>
                    <span class="submenu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="submenu collapse driver_sub_menu" aria-expanded="false">
                    @if (in_array('drivers', $role_has_permission))
                        <li class="submenu-item all_driver_menu"><a href="{!! url('drivers') !!}">
                            <i class="mdi mdi-account-drive submenu-icon"></i>{{ trans('lang.all_drivers') }}</a></li>
                    @endif
                    @if (in_array('approve_drivers', $role_has_permission))
                        <li class="submenu-item approve_driver_menu"><a href="{!! url('drivers/approved') !!}">
                            <i class="mdi mdi-check submenu-icon"></i>{{ trans('lang.approved_drivers') }}</a></li>
                    @endif
                    @if (in_array('pending_drivers', $role_has_permission))
                        <li class="submenu-item pending_driver_menu"><a href="{!! url('drivers/pending') !!}">
                            <i class="mdi mdi-clock-alert submenu-icon"></i>{{ trans('lang.approval_pending_drivers') }}</a></li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- Reports & Analytics Section -->
        @if (in_array('reports', $role_has_permission))
            <li class="menu-section">
                <span class="menu-section-title">{{ trans('lang.report_and_analytics') }}</span>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                    <i class="mdi mdi-chart-box-outline menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.report_plural') }}</span>
                    <span class="submenu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="submenu collapse" aria-expanded="false">
                    <li class="submenu-item"><a href="{!! url('/report/sales') !!}">
                        <i class="mdi mdi-chart-line submenu-icon"></i>{{ trans('lang.reports_sale') }}</a></li>
                </ul>
            </li>
        @endif

        <!-- Menu & Food Management Section -->
        @if (in_array('category', $role_has_permission) || in_array('foods', $role_has_permission) || in_array('item-attribute', $role_has_permission) || in_array('review-attribute', $role_has_permission))
            <li class="menu-section">
                <span class="menu-section-title">{{ trans('lang.menu_and_food_management') }}</span>
            </li>
        @endif
        @if (in_array('category', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('categories') !!}" aria-expanded="false">
                    <i class="mdi mdi-tag-multiple menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.category_plural') }}</span>
                </a>
            </li>
        @endif
        @if (in_array('foods', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('foods') !!}" aria-expanded="false">
                    <i class="mdi mdi-food-apple menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.food_plural') }}</span>
                </a>
            </li>
        @endif
        @if (in_array('item-attribute', $role_has_permission) || in_array('review-attribute', $role_has_permission))
            <li class="menu-item has-submenu">
                <a class="menu-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                    <i class="mdi mdi-puzzle-outline menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.attribute_plural') }}</span>
                    <span class="submenu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="submenu collapse" aria-expanded="false">
                    @if (in_array('item-attribute', $role_has_permission))
                        <li class="submenu-item"><a href="{!! route('attributes') !!}">
                            <i class="mdi mdi-tag-plus submenu-icon"></i>{{ trans('lang.item_attribute_id') }}</a></li>
                    @endif
                    @if (in_array('review-attribute', $role_has_permission))
                        <li class="submenu-item"><a href="{!! route('reviewattributes') !!}">
                            <i class="mdi mdi-star-box-outline submenu-icon"></i>{{ trans('lang.review_attribute_plural') }}</a></li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- Business Setup Section -->
        <li class="menu-section">
            <span class="menu-section-title">{{ trans('lang.business_setup') }}</span>
        </li>
        <li class="menu-item has-submenu">
            <a class="menu-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                <i class="mdi mdi-credit-card-outline menu-icon"></i>
                <span class="menu-text">{{ trans('lang.subscription_plans') }}</span>
                <span class="submenu-arrow"><i class="mdi mdi-chevron-right"></i></span>
            </a>
            <ul class="submenu collapse" aria-expanded="false">
                <li class="submenu-item"><a href="{!! route('subscription-plans.index') !!}">
                    <i class="mdi mdi-tag-check submenu-icon"></i>{{ trans('lang.subscription_plans') }}</a></li>
                <li class="submenu-item"><a href="{!! route('vendor.subscriptionPlanHistory') !!}">
                    <i class="mdi mdi-history submenu-icon"></i>{{ trans('lang.vendor_subscription_history_plural') }}</a></li>
            </ul>
        </li>

        <!-- Order & Promotions Management Section -->
        @if (in_array('orders', $role_has_permission) || in_array('gift-cards', $role_has_permission) || in_array('coupons', $role_has_permission) || in_array('documents', $role_has_permission))
            <li class="menu-section">
                <span class="menu-section-title">{{ trans('lang.order_and_promotions_management') }}</span>
            </li>
        @endif
        @if (in_array('orders', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('orders') !!}" aria-expanded="false">
                    <i class="mdi mdi-clipboard-list menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.order_plural') }}</span>
                </a>
            </li>
        @endif
        <li class="menu-item">
            <a class="menu-link waves-effect waves-dark" href="{!! url('deliveryman') !!}" aria-expanded="false">
                <i class="mdi mdi-human-dolly menu-icon"></i>
                <span class="menu-text">{{ trans('lang.deliveryman') }}</span>
            </a>
        </li>
        @if (in_array('gift-cards', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('gift-card') !!}" aria-expanded="false">
                    <i class="mdi mdi-gift-outline menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.gift_card_plural') }}</span>
                </a>
            </li>
        @endif
        @if (in_array('coupons', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('coupons') !!}" aria-expanded="false">
                    <i class="mdi mdi-sale menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.coupon_plural') }}</span>
                </a>
            </li>
        @endif

        <!-- Advertisements Section -->
        <li class="menu-section">
            <span class="menu-section-title">{{ trans('lang.advertisement_plural') }}</span>
        </li>
        <li class="menu-item has-submenu">
            <a class="menu-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                <i class="mdi mdi-bullhorn menu-icon"></i>
                <span class="menu-text">{{ trans('lang.advertisement_plural') }}</span>
                <span class="submenu-arrow"><i class="mdi mdi-chevron-right"></i></span>
            </a>
            <ul class="submenu collapse" aria-expanded="false">
                <li class="submenu-item"><a class="waves-effect waves-dark" href="{!! url('advertisements') !!}">
                    <i class="mdi mdi-plus-circle submenu-icon"></i>{{ trans('lang.add_list') }}</a></li>
                <li class="submenu-item"><a href="{!! url('advertisements-list/requests') !!}">
                    <i class="mdi mdi-file-document-edit submenu-icon"></i>{{ trans('lang.add_requests') }}</a></li>
            </ul>
        </li>

        @if (in_array('documents', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('documents') !!}" aria-expanded="false">
                    <i class="mdi mdi-file-document-outline menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.document_plural') }}</span>
                </a>
            </li>
        @endif

        <!-- Notification Management Section -->
        @if (in_array('general-notifications', $role_has_permission) || in_array('dynamic-notifications', $role_has_permission))
            <li class="menu-section">
                <span class="menu-section-title">{{ trans('lang.notification_management') }}</span>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                    <i class="mdi mdi-bell-outline menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.notification_plural') }}</span>
                    <span class="submenu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="submenu collapse" aria-expanded="false">
                    @if (in_array('general-notifications', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('notification') !!}">
                            <i class="mdi mdi-bell-ring submenu-icon"></i>{{ trans('lang.general_notification') }}</a></li>
                    @endif
                    @if (in_array('dynamic-notifications', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('dynamic-notification') !!}">
                            <i class="mdi mdi-lightning-bolt submenu-icon"></i>{{ trans('lang.dynamic_notification') }}</a></li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- Disbursement Management Section -->
        @if (in_array('payout-request', $role_has_permission))
            <li class="menu-section">
                <span class="menu-section-title">{{ trans('lang.disbursement_management') }}</span>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                    <i class="mdi mdi-bank-transfer menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.disbursements') }}</span>
                    <span class="submenu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="submenu collapse" aria-expanded="false">
                    @if (in_array('payout-request', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('payoutRequests/restaurants') !!}">
                            <i class="mdi mdi-store submenu-icon"></i>{{ trans('lang.restaurant_disbursement') }}</a></li>
                    @endif
                    @if (in_array('payout-request', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('payoutRequests/drivers') !!}">
                            <i class="mdi mdi-car submenu-icon"></i>{{ trans('lang.driver_disbursement') }}</a></li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- Design & Content Management Section -->
        @if (in_array('banners', $role_has_permission) || in_array('cms', $role_has_permission) || in_array('on-board', $role_has_permission) || in_array('email-template', $role_has_permission))
            <li class="menu-section">
                <span class="menu-section-title">{{ trans('lang.design_and_content_management') }}</span>
            </li>
        @endif
        @if (in_array('banners', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('banners') !!}" aria-expanded="false">
                    <i class="mdi mdi-view-carousel menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.menu_items') }}</span>
                </a>
            </li>
        @endif
        @if (in_array('cms', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('cms') !!}" aria-expanded="false">
                    <i class="mdi mdi-file-document-box-multiple menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.cms_plural') }}</span>
                </a>
            </li>
        @endif
        @if (in_array('on-board', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark onboard_menu" href="{!! url('on-board') !!}" aria-expanded="false">
                    <i class="mdi mdi-cellphone-arrow-down menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.on_board_plural') }}</span>
                </a>
            </li>
        @endif
        @if (in_array('email-template', $role_has_permission))
            <li class="menu-item">
                <a class="menu-link waves-effect waves-dark" href="{!! url('email-templates') !!}" aria-expanded="false">
                    <i class="mdi mdi-email-outline menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.email_templates') }}</span>
                </a>
            </li>
        @endif

        <!-- Settings & Configurations Section -->
        @if (in_array('global-setting', $role_has_permission) ||
                in_array('currency', $role_has_permission) ||
                in_array('payment-method', $role_has_permission) ||
                in_array('admin-commission', $role_has_permission) ||
                in_array('radius', $role_has_permission) ||
                in_array('dinein', $role_has_permission) ||
                in_array('tax', $role_has_permission) ||
                in_array('delivery-charge', $role_has_permission) ||
                in_array('language', $role_has_permission) ||
                in_array('special-offer', $role_has_permission) ||
                in_array('terms', $role_has_permission) ||
                in_array('privacy', $role_has_permission) ||
                in_array('home-page', $role_has_permission) ||
                in_array('footer', $role_has_permission) ||
                in_array('document-verification', $role_has_permission)||
                in_array('scheduleOrderNotification', $role_has_permission))
            <li class="menu-section">
                <span class="menu-section-title">{{ trans('lang.settings_and_configurations') }}</span>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                    <i class="mdi mdi-cog-outline menu-icon"></i>
                    <span class="menu-text">{{ trans('lang.app_setting') }}</span>
                    <span class="submenu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="submenu collapse" aria-expanded="false">
                    @if (in_array('global-setting', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/app/globals') !!}">
                            <i class="mdi mdi-earth submenu-icon"></i>{{ trans('lang.app_setting_globals') }}</a></li>
                    @endif
                    @if (in_array('currency', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/currencies') !!}">
                            <i class="mdi mdi-currency-usd submenu-icon"></i>{{ trans('lang.currency_plural') }}</a></li>
                    @endif
                    @if (in_array('payment-method', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/payment/paystack') !!}">
                            <i class="mdi mdi-credit-card-outline submenu-icon"></i>{{ trans('lang.payment_methods') }}</a></li>
                    @endif
                    @if (in_array('admin-commission', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/app/adminCommission') !!}">
                            <i class="mdi mdi-percent submenu-icon"></i>{{ trans('lang.business_model_settings') }}</a></li>
                    @endif
                    @if (in_array('global-setting', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/app/zohoFlow') !!}">
                            <i class="mdi mdi-flow-branch submenu-icon"></i>{{ trans('lang.zoho_flow') }}</a></li>
                    @endif
                    @if (in_array('radius', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/app/radiusConfiguration') !!}">
                            <i class="mdi mdi-radius submenu-icon"></i>{{ trans('lang.radios_configuration') }}</a></li>
                    @endif
                    @if (in_array('dinein', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/app/bookTable') !!}">
                            <i class="mdi mdi-table-furniture submenu-icon"></i>{{ trans('lang.dine_in_future_setting') }}</a></li>
                    @endif
                    @if (in_array('scheduleOrderNotification', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/app/scheduleOrderNotification') !!}">
                            <i class="mdi mdi-clock-outline submenu-icon"></i>{{ trans('lang.schedule_order_notification_title') }}</a></li>
                    @endif
                    @if (in_array('tax', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('tax') !!}">
                            <i class="mdi mdi-receipt submenu-icon"></i>{{ trans('lang.vat_setting') }}</a></li>
                    @endif
                    @if (in_array('delivery-charge', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/app/deliveryCharge') !!}">
                            <i class="mdi mdi-truck-delivery submenu-icon"></i>{{ trans('lang.deliveryCharge') }}</a></li>
                    @endif
                    @if (in_array('document-verification', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/app/documentVerification') !!}">
                            <i class="mdi mdi-badge-account-horizontal submenu-icon"></i>{{ trans('lang.document_verification') }}</a></li>
                    @endif
                    @if (in_array('language', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/app/languages') !!}">
                            <i class="mdi mdi-translate submenu-icon"></i>{{ trans('lang.languages') }}</a></li>
                    @endif
                    @if (in_array('special-offer', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('settings/app/specialOffer') !!}">
                            <i class="mdi mdi-sale submenu-icon"></i>{{ trans('lang.special_offer') }}</a></li>
                    @endif
                    @if (in_array('terms', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('termsAndConditions') !!}">
                            <i class="mdi mdi-file-document submenu-icon"></i>{{ trans('lang.terms_and_conditions') }}</a></li>
                    @endif
                    @if (in_array('privacy', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('privacyPolicy') !!}">
                            <i class="mdi mdi-shield-lock submenu-icon"></i>{{ trans('lang.privacy_policy') }}</a></li>
                    @endif
                    @if (in_array('home-page', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('homepageTemplate') !!}">
                            <i class="mdi mdi-home-city submenu-icon"></i>{{ trans('lang.homepageTemplate') }}</a></li>
                    @endif
                    @if (in_array('footer', $role_has_permission))
                        <li class="submenu-item"><a href="{!! url('footerTemplate') !!}">
                            <i class="mdi mdi-page-layout-footer submenu-icon"></i>{{ trans('lang.footer_template') }}</a></li>
                    @endif
                </ul>
            </li>
        @endif
    </ul>
</nav>

<!-- Sidebar Footer with Dark Mode Toggle -->
<div class="sidebar-footer glass-footer">
    <div class="sidebar-footer-content">
        <p class="web_version"></p>
        <button class="dark-mode-toggle" onclick="toggleDarkMode()" title="Toggle Dark Mode">
            <i class="mdi mdi-weather-night" id="darkModeIcon"></i>
            <span class="toggle-text">Dark Mode</span>
        </button>
    </div>
</div>

<script>
    // Enhanced filter menu function with smooth animations
    function filterMenu() {
        const searchInput = document.getElementById('sideBarSearchInput').value.toLowerCase();
        const menuItems = document.querySelectorAll('#sidebarnav > li');
        const sections = document.querySelectorAll('#sidebarnav > li.menu-section');
        
        for (let i = 0; i < menuItems.length; i++) {
            const item = menuItems[i];
            if (item.classList.contains('menu-section')) continue;
            
            const itemText = item.textContent.toLowerCase();
            const searchInputLower = searchInput.toLowerCase();
            
            if (itemText.indexOf(searchInputLower) === -1) {
                item.style.display = 'none';
                item.style.opacity = '0';
                item.style.transform = 'translateX(-10px)';
                item.style.transition = 'all 0.3s ease';
            } else {
                item.style.display = '';
                item.style.opacity = '1';
                item.style.transform = 'translateX(0)';
            }
        }
        
        // Hide empty sections
        sections.forEach(section => {
            const nextElement = section.nextElementSibling;
            let hasVisibleItems = false;
            let sibling = nextElement;
            while (sibling && !sibling.classList.contains('menu-section')) {
                if (sibling.style.display !== 'none') {
                    hasVisibleItems = true;
                    break;
                }
                sibling = sibling.nextElementSibling;
            }
            section.style.display = hasVisibleItems ? '' : 'none';
        });
    }
    
    // Dark mode toggle function
    function toggleDarkMode() {
        const body = document.body;
        const icon = document.getElementById('darkModeIcon');
        const toggleText = document.querySelector('.toggle-text');
        
        body.classList.toggle('dark-sidebar');
        
        if (body.classList.contains('dark-sidebar')) {
            icon.classList.remove('mdi-weather-night');
            icon.classList.add('mdi-weather-sunny');
            toggleText.textContent = 'Light Mode';
            localStorage.setItem('sidebarDarkMode', 'enabled');
        } else {
            icon.classList.remove('mdi-weather-sunny');
            icon.classList.add('mdi-weather-night');
            toggleText.textContent = 'Dark Mode';
            localStorage.setItem('sidebarDarkMode', 'disabled');
        }
    }
    
    // Initialize dark mode from localStorage
    document.addEventListener('DOMContentLoaded', function() {
        const savedMode = localStorage.getItem('sidebarDarkMode');
        if (savedMode === 'enabled') {
            document.body.classList.add('dark-sidebar');
            const icon = document.getElementById('darkModeIcon');
            icon.classList.remove('mdi-weather-night');
            icon.classList.add('mdi-weather-sunny');
            document.querySelector('.toggle-text').textContent = 'Light Mode';
        }
    });
</script>
