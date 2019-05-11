@extends('layouts.app')
@section('breadcrumbs')
<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><i class="icon-list"></i> {{ $category->name }}</h1>
            </div>
            <div class="col-md-12">
                <div class="crumbs">
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    <span class="crumbs-span">/</span>
                    <span class="crumbs-span">{{ __('Tags') }}</span>
                    <span class="crumbs-span">/</span>
                    <span class="current">{{ $category->name }}</span>
                </div>
            </div>
        </div><!-- End row -->
    </section><!-- End container -->
</div><!-- End breadcrumbs -->
@endsection
@section('main')
<div class="col-md-12">
    <div class="tabs-warp question-tab">
        <div class="tab-inner-warp">
            <div class="tab-inner">
                {{ $questions->render('paginations.paginate') }}
                @foreach ($questions as $question)
                <article class="question question-type-normal">
                    <h2>
                        <a href="{{ route('questions.show', ['id' => $question->id]) }}">{{ $question->title }}</a>
                    </h2>
                    <a class="question-report" href="#">{{ __('Report') }}</a>
                    @if ($question->is_poll)
                    <div class="question-type-main"><i class="icon-signal"></i>{{ __('Poll') }}</div>
                    @else
                    <div class="question-type-main"><i class="icon-question-sign"></i>{{ __('Question') }}</div>
                    @endif

                    <div class="question-author">
                        <a href="#" original-title="{{ $question->user->fullname }}" class="question-author-img tooltip-n">
                            <span></span>
                        <img alt="" src="{{ asset($question->user->avatar) }}">
                        </a>
                    </div>
                    <div class="question-inner">
                        <div class="clearfix"></div>
                        {{-- <p class="question-desc">{{$question->content}}</p> --}}
                        <div class="question-details">
                            @if ($question->is_resolve == 0)
                            <span class="question-answered"><i class="icon-ok"></i>{{ __('in progress') }}</span>
                            @else
                            <span class="question-answered question-answered-done"><i class="icon-ok"></i>{{ __('solved') }}</span>
                            @endif
                            <span class="question-favorite"><i class="icon-thumbs-up"></i>{{ $question->votes->count() }}</span>
                        </div>
                        <span class="question-category"><a href="#"><i class="icon-folder-close"></i>{{ $question->category->name }}</a></span>
                        <span class="question-date"><i class="icon-time"></i>{{ $question->created_at->diffForHumans() }}</span>
                        <span class="question-comment"><a href="#"><i class="icon-comment"></i>{{ $question->answers->count() }} {{ __('Answer') }}</a></span>
                        <span class="question-view"><i class="icon-user"></i>{{ $question->view }} {{ __('Views') }}</span>
                        <div class="clearfix"></div>
                    </div>
                </article>
                @endforeach
                {{ $questions->render('paginations.paginate') }}
            </div>
        </div>
    </div><!-- End page-content -->
</div><!-- End main -->
@endsection