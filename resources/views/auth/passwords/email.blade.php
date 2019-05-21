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
        @if (session('status'))
        <span class="active-clip">{{ session('status') }}</span>
        @endif
        <h2>{{ __('Email') }}</h2>
        <div class="form-style form-style-3">
            <form action="{{ route('password.email') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-inputs clearfix">
                    @error('email')
                    <span class="error">{{ $message }}</span>
                    @enderror
                    <p class="login-text">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}">
                        <i class="icon-envelope"></i>
                    </p>
                </div>
                <p class="form-submit login-submit">
                    <input type="submit" value="{{ __('Send Password Reset Link') }}" class="button color small login-submit submit">
                </p>
            </form>
            <div class="clearfix"></div>
        </div>
    </div><!-- End page-content -->
</div><!-- End col-md-6 -->
@endsection
