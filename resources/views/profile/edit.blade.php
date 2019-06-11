@extends('layouts.app')
@section('main')
<div class="height_20"></div>
<div class="col-md-3">
    @include('profile.sidebar')
</div>
<div class="col-md-9">
    <div class="page-content">
    <div class="boxedtitle page-title"><h2>{{ __('Update Profile') }}</h2></div>
        <div class="form-style form-style-4">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put" />
                <div class="form-inputs clearfix">
                    <p>
                        <label class="required">{{ __('First Name') }} <span>*</span></label>
                        <input type="text" value="{{ Auth::user()->first_name }}" name="first_name">
                        @error('first_name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </p>
                    <p>
                        <label class="required">{{ __('Last Name') }} <span>*</span></label>
                        <input type="text" value="{{ Auth::user()->last_name }}" name="last_name">
                        @error('last_name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </p>
                    <p>
                        <label>{{ __('Website') }}</label>
                        <input type="text" value="{{ Auth::user()->website }}" name="website">
                    </p>
                    <p>
                        <label>{{ __('Country') }}</label>
                        <input type="text" value="{{ Auth::user()->country }}" name="country">
                    </p>
                </div>
                <div class="form-inputs clearfix">
                    <p>
                        <label>{{ __('Facebook') }}</label>
                        <input type="text" value="{{ Auth::user()->facebook }}" name="facebook">
                    </p>
                    <p>
                        <label>{{ __('Twitter') }}</label>
                        <input type="text" value="{{ Auth::user()->twitter }}" name="twitter">
                    </p>
                    <p>
                        <label>{{ __('Linkedin') }}</label>
                        <input type="email" value="{{ Auth::user()->linker }}" name="linker">
                    </p>
                    <p>
                        <label>{{ __('Google plus') }}</label>
                        <input type="text" value="{{ Auth::user()->google }}" name="google">
                    </p>
                </div>
                <div class="form-style form-style-2">
                <div class="user-profile-img"><img id="avatar_preview" src="{{ asset(config('asset.avatar_path') . Auth::user()->avatar) }}" alt="{{ asset(Auth::user()->fullname) }}"></div>
                    <p class="user-profile-p">
                        <label>{{ __('Profile Picture') }}</label>
                        <div class="fileinputs">
                            <input type="file" class="file" name='avatar' accept="image/*" id="avatar">
                            <div class="fakefile">
                                <button type="button" class="button small margin_0">{{ __('Select file') }}</button>
                                <span><i class="icon-arrow-up"></i>{{ __('Browse') }}</span>
                            </div>
                        </div>
                    <p></p>
                    <div class="clearfix"></div>
                    <p>
                        <label>{{ __('About Yourself') }}</label>
                        <textarea cols="58" rows="8" name="info">{{ Auth::user()->info }}</textarea>
                    </p>
                </div>
                <p class="form-submit">
                    <input type="submit" value="{{ __('Update') }}" class="button color small login-submit submit">
                </p>
            </form>
        </div>
    </div><!-- End page-content -->
</div><!-- End main -->
@endsection
