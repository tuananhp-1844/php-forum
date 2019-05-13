@extends('layouts.app')
@section('breadcrumbs')
<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ __('Tags') }}</h1>
            </div>
            <div class="col-md-12">
                <div class="crumbs">
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    <span class="crumbs-span">/</span>
                    <span class="current">{{ __('Tags') }}</span>
                </div>
            </div>
        </div><!-- End row -->
    </section><!-- End container -->
</div><!-- End breadcrumbs -->
@endsection
@section('main')
<div class="col-md-12">
    <div class="page-content page-content-user-profile">
        <div class="user-profile-widget">
        <h2>{{ __('Tags') }}</h2>
        <div class="ul_list ul_list-icon-ok">
            <ul>
                @foreach ($tags as $tag)
                <li><i class="icon-tags"></i><a href="{{ route('tags.questions.index', ['tag' => $tag->id]) }}">{{ $tag->name }}<span> ( <span>{{ $tag->questions->count() }}</span> ) </span></a></li>
                @endforeach
            </ul>
        </div>
        </div><!-- End user-profile-widget -->
    </div><!-- End page-content -->
    <div class="height_20"></div>
    {{ $tags->render('paginations.paginate') }}
</div><!-- End col-md-12 -->
@endsection
