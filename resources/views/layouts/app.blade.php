<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<title>Ask me – Responsive Questions and Answers Template</title>
	<meta name="description" content="Ask me Responsive Questions and Answers Template">
	<meta name="author" content="2code.info">
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- Main Style -->
	<link rel="stylesheet" href="{{ asset('bower_components/asset-project1-sun/style.css') }}">
	
	<!-- Skins -->
	<link rel="stylesheet" href="{{ asset('bower_components/asset-project1-sun/css/skins/blue.css') }}">
	
	<!-- Responsive Style -->
	<link rel="stylesheet" href="{{ asset('bower_components/asset-project1-sun/css/responsive.css') }}">
	
	<!-- Favicons -->
	<link rel="shortcut icon" href="{{ asset('bower_components/asset-project1-sun/images/favicon.png') }}">
  
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

	<link rel="stylesheet" href="{{ asset('bower_components/simplemde/dist/simplemde.min.css') }}">
	{{-- <link rel="stylesheet" href="{{ asset('bower_components/dropzone/dist/dropzone.css') }}"> --}}
</head>
<body>

<div class="loader"><div class="loader_html"></div></div>
<div id="wrap" class="grid_1200">
    @include('layouts.header')
	@yield('breadcrumbs')
    @yield('ask-me')	
	<section class="container main-content">
		<div class="row">
            @yield('main')
            @yield('sidebar')
		</div><!-- End row -->
	</section><!-- End container -->
	@include('layouts.footer')
</div><!-- End wrap -->
<div class="go-up"><i class="icon-chevron-up"></i></div>
<!-- js -->
<script src="{{ asset('bower_components/asset-project1-sun/js/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/jquery-ui-1.10.3.custom.min.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/jquery.easing.1.3.min.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/html5.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/twitter/jquery.tweet.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/jflickrfeed.min.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/jquery.inview.min.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/jquery.tipsy.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/tabs.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/jquery.scrollTo.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/jquery.nav.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/tags.js') }}"></script>
<script src="{{ asset('bower_components/asset-project1-sun/js/jquery.bxslider.min.js') }}"></script>
<script src="{{ asset('bower_components/simplemde/dist/simplemde.min.js') }}"></script>
{{-- <script src="{{ asset('bower_components/dropzone/dist/dropzone.js') }}"></script> --}}
{{-- <script src="{{ asset('bower_components/taggle/src/taggle.js') }}"></script> --}}
<script src="{{ asset('js/custom.js') }}"></script>
<!-- End js -->

</body>

</html>
