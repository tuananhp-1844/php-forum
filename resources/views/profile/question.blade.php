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
            <h2><i class="fa fa-question"></i> {{ __('My question') }}</h2>
        </div>
        <div class="page-content page-content-user">
            <div class="user-questions">
                @if (!$questions->count())
                <div class="height_20"></div>
                {{ __('No Question') }}
                @endif
                @foreach ($questions as $question)
                <article class="question user-question">
                    <h3>
                        <a href="{{ route('questions.show', ['id' => $question->id]) }}">{{ $question->title }}</a>
                    </h3>
                    @if ($question->is_poll)
                    <div class="question-type-main"><i class="icon-signal"></i>{{ __('Poll') }}</div>
                    @else
                    <div class="question-type-main"><i class="icon-question-sign"></i>{{ __('Question') }}</div>
                    @endif
                    <div class="question-content">
                        <div class="question-bottom">
                            @if ($question->is_resolve == 0)
                            <div class="question-answered"><i class="icon-ok"></i>{{ __('in progress') }}</div>
                            @else
                            <div class="question-answered question-answered-done"><i
                                    class="icon-ok"></i>{{ __('solved') }}
                            </div>
                            @endif
                            <span class="question-favorite"><i
                                    class="icon-star"></i>{{ $question->votes->count() }}</span>
                            <span class="question-category"><a href="#"><i
                                        class="icon-folder-close"></i>{{ $question->category->name }}</a></span>
                            <span class="question-date"><i
                                    class="icon-time"></i>{{ $question->created_at->diffForHumans() }}</span>
                            <span class="question-comment"><a href="#"><i
                                        class="icon-comment"></i>{{ $question->answers->count() }}
                                    {{ __('Answer') }}</a></span>
                            <span class="question-view"><i class="icon-user"></i>{{ $question->view }}
                                {{ __('Views') }}</span>
                        </div>
                    </div>
                </article>
                @endforeach
                {{ $questions->render('paginations.paginate') }}
            </div>
        </div>
    </div><!-- End main -->
</div>
</div>
@endsection
