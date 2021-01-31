{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.loginlay')

@section('content')
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <div class="card">
                <div class="card-body p-0 auth-header-box">
                    <div class="text-center p-3">
                        <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Войти CRM</h4>
                        <p class="text-muted  mb-0"></p>
                    </div>
                </div>
                <div class="card-body p-0">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
                            <form class="form-horizontal auth-form" method="POST" action="{{ route('login') }}">

                                @csrf

                                <div class="form-group mb-2">
                                    <label for="username">Логин</label>
                                    <div class="input-group">
                                        <input id="email" type="email" class="form-control @error('email') @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                                <!--end form-group-->

                                <div class="form-group mb-2">
                                    <label for="userpassword">Пароль</label>
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') @enderror" name="password" required
                                            autocomplete="current-password">
                                    </div>
                                </div>
                                <!--end form-group-->

                                {{-- <div class="form-group row my-3">
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-switch switch-success">
                                            <input type="checkbox" class="custom-control-input" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label text-muted"
                                                for="remember">Запомнить меня</label>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div> --}}
                                <!--end form-group-->

                                <div class="form-group mb-0 row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                                            {{ __('Войти') }}<i class="fas fa-sign-in-alt ml-1"></i>
                                        </button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end form-group-->
                            </form>
                        </div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
