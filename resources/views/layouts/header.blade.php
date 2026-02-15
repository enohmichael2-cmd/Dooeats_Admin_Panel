<div class="navbar-header">
    <a class="navbar-brand" href="<?php echo URL::to('/'); ?>">
        <b>
            <img src="{{ asset('/images/logo_web.png') }}" alt="homepage" class="dark-logo" width="100%" id="logo_web">
            <img src="{{ asset('images/logo-light-icon.png') }}" alt="homepage" class="light-logo">
        </b>
        <span>
        </span>
    </a>
</div>
<div class="navbar-collapse">
    <ul class="navbar-nav mr-auto mt-md-0">
        <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
        <li class="nav-item m-l-0"><a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                       href="javascript:void(0)"><i class="ti-menu"></i></a></li>
    </ul>
    <div style="visibility: hidden;" class="language-list icon d-flex align-items-center text-light ml-2"
         id="language_dropdown_box">
        <div class="language-select">
            <i class="fa fa-globe"></i>
        </div>
        <div class="language-options">
            <select class="form-control changeLang text-dark" id="language_dropdown">
            </select>
        </div>
    </div>
    <ul class="navbar-nav my-lg-0 border-left pl-2 ml-2">
        <li class="nav-item dropdown">
           <div class="d-flex align-items-center dropdown-toggle waves-effect waves-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
            <a class="nav-link profile-pic-container" href="">
               <img src="{{ asset('/images/users/user-new.png') }}" alt="user" class="profile-pic"></a>
               <div class="nav-item-user">
                <h5 class="text-dark mb-0">{{  Auth::user()->name }}</h5>
                <p class="mb-0 text-muted">{{ session()->has('user_role') ? session()->get('user_role') : 'Admin' }}</p>
               </div>  
               <i class="fa fa-angle-down ml-2 text-muted"></i>
             </div>
            <div class="dropdown-menu dropdown-menu-right scale-up glass-card">
                <ul class="dropdown-user">
                    <li>
                        <div class="dw-user-box">
                            <div class="u-img"><img src="{{ asset('/images/users/user-new.png') }}" alt="user"></div>
                            <div class="u-text">
                                <h4>{{  Auth::user()->name }}</h4>
                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                <a href="{{ route('users.profile') }}" class="btn btn-rounded btn-danger btn-sm">{{ trans('lang.view_profile') }}</a>
                            </div>
                        </div>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('users.profile') }}"><i class="ti-user"></i> {!! trans('lang.user_profile') !!}</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> {{ __('Logout') }}</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </li>
    </ul>
</div>