<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>{{ __('Ask me – Responsive Questions and Answers Template') }}</title>
    <meta name="description" content="{{ __('Ask me Responsive Questions and Answers Template') }}">
    <meta name="author" content="2code.info">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset(config('asset.asset_project').'/style.css') }}">

    <!-- Skins -->
    <link rel="stylesheet" href="{{ asset(config('asset.asset_project').'/css/skins/blue.css') }}">

    <!-- Responsive Style -->
    <link rel="stylesheet" href="{{ asset(config('asset.asset_project').'/css/responsive.css') }}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset(config('asset.asset_project').'/images/favicon.png') }}">

    <link rel="stylesheet" href="{{ mix('css/all.css') }}">

    <link rel="stylesheet" href="{{ asset(config('asset.asset_project').'/js/prism/prism.css') }}">

    <link rel="stylesheet" href="{{ asset('bower_components/simplemde/dist/simplemde.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('bower_components/dropzone/dist/dropzone.css') }}"> --}}
</head>

<body>
    <div class="loader">
        <div class="loader_html"></div>
    </div>
    <div id="wrap" class="grid_1200">
        @include('layouts.header')
        @yield('breadcrumbs')
        @yield('ask-me')
        <section class="container main-content">
            <div class="row">
                @if (Auth::check() && !Auth::user()->hasVerifiedEmail())
                <div class="col-md-12">
                    <p>
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </p>
                </div>
                @endif
                @yield('main')
                @yield('sidebar')
            </div><!-- End row -->
        </section><!-- End container -->
        @include('layouts.footer')
    </div><!-- End wrap -->
    <div class="go-up"><i class="icon-chevron-up"></i></div>
    <input type="file" id="hidden-input-file" accept="image/*"/>
    <!-- js -->
    <script src="{{ asset(config('asset.asset_project').'/js/jquery.min.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/jquery-ui-1.10.3.custom.min.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/jquery.easing.1.3.min.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/html5.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/twitter/jquery.tweet.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/jflickrfeed.min.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/jquery.inview.min.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/jquery.tipsy.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/tabs.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/jquery.scrollTo.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/jquery.nav.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/tags.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/notify.min.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset(config('asset.asset_project').'/js/prism/prism.js') }}"></script>
    <script src="{{ asset('bower_components/simplemde/dist/simplemde.min.js') }}"></script>
    <script src="{{ mix('js/all.js') }}"></script>
    <!-- End js -->
    @stack('scripts')
</body>

</html>
