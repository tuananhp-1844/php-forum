@extends('layouts.app')
@section('breadcrumbs')
<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ __('login') }}</h1>
            </div>
            <div class="col-md-12">
                <div class="crumbs">
                    <a href="#">{{ __('home') }}</a>
                    <span class="crumbs-span">/</span>
                    <a href="#">{{ __('Pages') }}</a>
                    <span class="crumbs-span">/</span>
                    <span class="current">{{ __('login') }}</span>
                </div>
            </div>
        </div><!-- End row -->
    </section><!-- End container -->
</div>
@endsection
@section('main')
<div class="col-md-6">
    <div class="page-content">
        <h2>{{ __('login') }}</h2>
        <div class="form-style form-style-3">
            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-inputs clearfix">
                    @error('email')
                    <span class="error">{{ $message }}</span>
                    @enderror
                    <p class="login-text">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}">
                        <i class="icon-envelope"></i>
                    </p>
                    @error('password')
                    <span class="error">{{ $message }}</span>
                    @enderror
                    <p class="login-password">
                        <input type="password" placeholder="{{ __('Password') }}" value="{{ old('password') }}" name="password" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}">
                        <i class="icon-lock"></i>
                        <a href="#">{{ __('Forget') }}</a>
                    </p>
                </div>
                <p class="form-submit login-submit">
                    <input type="submit" value="{{ __('login') }}" class="button color small login-submit submit">
                </p>
                <div class="rememberme">
                    <label><input type="checkbox" checked="checked" name="remember_me"> {{ __('Remember Me') }}</label>
                </div>
            </form>
            <ul class="login-links">
                <li><a href="{{ route('redirect-social', ['social' => 'facebook']) }}"><i class="icon-facebook"></i>{{ __('facebook') }}</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div><!-- End page-content -->
</div><!-- End col-md-6 -->
<div class="col-md-6">
    <div class="page-content">
        <h2>{{ __('Register Now') }}</h2>
        <p>
            {{ __('Lorem') }}
        </p>
        <a class="button small color" href="{{ route('register') }}">{{ __('Create an account') }}</a>
    </div><!-- End page-content -->
</div><!-- End col-md-6 -->
@endsection
