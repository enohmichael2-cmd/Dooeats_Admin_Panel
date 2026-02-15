@extends('layouts.auth')

@section('content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="auth-box p-4 bg-white rounded glass-card" style="max-width: 400px; width: 90%; box-shadow: var(--shadow-lg);">
        <div class="loginform-wrapper">
            <div class="logo text-center mb-4">
                <span class="db"><img src="{{ asset('images/logo_web.png') }}" alt="logo" width="150" style="object-fit: contain; max-height: 80px;" /></span>
                <h5 class="font-medium mb-3 mt-3 text-dark">Admin Login</h5>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal mt-3" id="loginform" action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="email" class="text-dark">Email Address</label>
                            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Enter email" required autocomplete="email" autofocus>
                             @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="text-dark">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Enter password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label text-dark" for="customCheck1">Remember me</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-4">
                            <div class="col-xs-12 pb-3">
                                <button class="btn btn-block btn-lg btn-primary btn-rounded" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
