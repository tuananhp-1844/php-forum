@extends('layouts.app')
@section('breadcrumbs')
<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ __('Reset Password') }}</h1>
            </div>
            <div class="col-md-12">
                <div class="crumbs">
                    <a href="#">{{ __('home') }}</a>
                    <span class="crumbs-span">/</span>
                    <a href="#">{{ __('Pages') }}</a>
                    <span class="crumbs-span">/</span>
                    <span class="current">{{ __('Reset Password') }}</span>
                </div>
            </div>
        </div><!-- End row -->
    </section><!-- End container -->
</div>
@endsection
@section('main')
<div class="col-md-12">
    <div class="page-content">
        <h2>{{ __('Reset Password') }}</h2>
        <div class="form-style form-style-3">
            <form action="{{ route('password.update') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
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
                    </p>
                    <p class="login-password">
                        <input type="password" placeholder="{{ __('password confirmation') }}" value="{{ old('password_confirmation') }}" name="password_confirmation" onfocus="if (this.value == 'Password confirmation') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password confirmation';}">
                        <i class="icon-lock"></i>
                    </p>
                </div>
                <p class="form-submit login-submit">
                     <input type="submit" value="{{ __('Reset Password') }}" class="button color small login-submit submit">
                </p>
            </form>
        </div>
    </div><!-- End page-content -->
</div>

@endsection
