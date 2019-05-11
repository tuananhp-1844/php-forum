@extends('layouts.app')
@section('breadcrumbs')
<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ __('Categories') }}</h1>
            </div>
            <div class="col-md-12">
                <div class="crumbs">
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    <span class="crumbs-span">/</span>
                    <span class="current">{{ __('Categories') }}</span>
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
        <h2>{{ __('Categories') }}</h2>
        <div class="ul_list ul_list-icon-ok">
            <ul>
                @foreach ($categories as $category)
                <li><i class="icon-list"></i><a href="{{ route('categories.questions.index', ['category' => $category->id]) }}">{{ $category->name }}<span> ( <span>{{ $category->questions->count() }}</span> ) </span></a></li>
                @endforeach
                <div>
                    {{ $categories->render('paginations.paginate') }}
                </div>
            </ul>
        </div>
        </div><!-- End user-profile-widget -->
    </div><!-- End page-content -->
</div><!-- End col-md-12 -->
@endsection
