@extends('layouts.app')
@section('breadcrumbs')
@section('main')
<div class="height_20"></div>
<div class="col-md-3">
    @include('profile.sidebar')
</div>
<div class="col-md-9">
    <div class="page-content">
        <div class="boxedtitle page-title">
            <h2><i class="fa fa-pencil"></i> {{ __('My post') }}</h2>
        </div>
        <div class="page-content page-content-user">
            <div class="user-questions">
                @if (!$posts->count())
                <div class="height_20"></div>
                {{ __('No Question') }}
                @endif
                @foreach ($posts as $post)
                <article class="question user-question">
                    <h3>
                        <a href="{{ route('posts.show', ['id' => $post->id, 'slug' => $post->slug]) }}">{{ $post->title }}</a>
                    </h3>
                    <div class="question-type-main"><i class="fa fa-pencil"></i>{{ __('Post') }}</div>
                    <div class="question-content">
                        <div class="question-bottom">
                            <span class="question-category"><a href="#"><i class="icon-folder-close"></i>{{ $post->category->name }}</a></span>
                            <span class="question-date"><i class="icon-time"></i>{{ $post->created_at->diffForHumans() }}</span>
                            <span class="question-comment"><a href="#"><i class="icon-comment"></i>{{ $post->comments->count() }} {{ __('Comments') }}</a></span>
                            <span class="question-view"><i class="icon-user"></i>{{ $post->view }} {{ __('Views') }}</span>
                        </div>
                    </div>
                </article>
                @endforeach
                {{ $posts->render('paginations.paginate') }}
            </div>
        </div>
    </div><!-- End main -->
</div>
</div>
@endsection
