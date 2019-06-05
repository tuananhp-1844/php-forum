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
                    <span class="current">{{ __('Register') }}</span>
                </div>
            </div>
        </div><!-- End row -->
    </section><!-- End container -->
</div>
@endsection
@section('main')
<div class="col-md-6">
    <div class="page-content">
        <h2>{{ __('Register Now') }}</h2>
        <div class="form-style form-style-3">
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-inputs clearfix">
                    <p>
                        <label class="required">{{ __('First Name') }}<span>*</span></label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}">
                        @error('first_name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </p>
                    <p>
                        <label class="required">{{ __('Last Name') }}<span>*</span></label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}">
                        @error('last_name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </p>
                    <p>
                        <label class="required">{{ __('Email') }}<span>*</span></label>
                        <input type="email" name="email" {{ old('email') }}>
                        @error('email')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </p>
                    <p>
                        <label class="required">{{ __('Password') }}<span>*</span></label>
                        <input type="password" value="" name="password">
                        @error('password')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </p>
                    <p>
                        <label class="required">{{ __('Confirm Password') }}<span>*</span></label>
                        <input type="password" value="" name="password_confirmation">
                    </p>
                </div>
                <p class="form-submit">
                    <input type="submit" value="Signup" class="button color small submit" name="register">
                </p>
            </form>
        </div>
    </div><!-- End page-content -->
</div><!-- End col-md-6 -->
<div class="col-md-6">
    <div class="page-content">
        <h2>{{ __('Login Now') }}</h2>
        <p>
            {{ __('Lorem') }}
        </p>
        <a class="button small color" href="{{ route('login') }}">{{ __('Login') }}</a>
    </div><!-- End page-content -->
</div><!-- End col-md-6 -->
@endsection
