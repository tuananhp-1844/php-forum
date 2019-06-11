@extends('layouts.app')
@section('breadcrumbs')
<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ __('Ask Question') }}</h1>
            </div>
            <div class="col-md-12">
                <div class="crumbs">
                    <a href="#">{{ __('Home') }}</a>
                    <span class="crumbs-span">/</span>
                    <a href="#">{{ __('Pages') }}</a>
                    <span class="crumbs-span">/</span>
                    <span class="current">{{ __('Edit Question') }}</span>
                </div>
            </div>
        </div><!-- End row -->
    </section><!-- End container -->
</div><!-- End breadcrumbs -->
@endsection
@section('main')
<div class="col-md-12">
<div class="page-content ask-question">
    <div class="boxedtitle page-title">
        <h2>{{ __('Edit Question') }}</h2>
    </div>
    <div class="form-style form-style-3" id="question-submit">
        <form method = "POST" action="{{ route('questions.update', ['question' => $question->id]) }}">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="form-inputs clearfix">
                <p>
                    <label class="required">{{ __('Question Title') }}<span>*</span></label>
                    <input type="text" id="question-title" name="title" value="{{ $question->title }}">
                    @error('title')
                        <span class="error form-description">{{ $message }}</span>
                    @enderror
                </p>
                <p>
                    <label>{{ __('Tags') }}</label>
                    <input type="text" class="input" name="tags" id="question_tags" data-seperator="," value="{{ implode(',', $question->tags->pluck('name')->toArray()) }}">
                </p>
                <p>
                    <label class="required">{{ __('Category') }}<span>*</span></label>
                    <span class="styled-select">
                    <select name="category" value = "{{ old('category') }}">
                        <option value="">{{ __('Select a Category') }}</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id === $question->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    </span>
                    @error('category')
                        <span class="error form-description">{{ $message }}</span>
                    @enderror
                </p>
                <p class="question_poll_p">
                    <label for="question_poll">{{ __('Poll') }}</label>
                    <input type="checkbox" id="question_poll" name="question_poll" {{ $question->is_poll ? 'checked' : '' }}>
                    <span class="question_poll">{{ __('This question is a poll') }} ?</span>
                    <span class="poll-description">{{ __('If you want to be doing a poll click here') }} .</span>
                </p>
                <span class="error form-description poll-error"></span>
                <div class="clearfix"></div>
                <div class="poll_options">
                    <p class="form-submit add_poll">
                        <button id="add_poll" type="button" class="button color small submit"><i class="icon-plus"></i>{{ __('Add Field') }}</button>
                    </p>
                    <ul id="question_poll_item">
                        @foreach ($question->polls as $poll)
                        <li id="poll_li_1">
                            <div class="poll-li">
                                <p>
                                    <input id="ask[{{ $poll->id }}][title]" class="ask" name="ask[{{ $poll->id }}][title]" value="{{ $poll->title }}" type="text">    
                                </p>
                                {{-- <input id="ask[1][value]" name="ask[1][value]" value="" type="hidden">
                                <input id="ask[1][id]" name="ask[1][id]" value="1" type="hidden"> --}}
                                <div class="del-poll-li"><i class="icon-remove"></i></div>
                                <div class="move-poll-li"><i class="icon-fullscreen"></i></div>
                            </div>
                        </li> 
                        @endforeach
                    </ul>
                    <script> var nextli = {{ $question->polls->count() + 1 }};</script>
                    <div class="clearfix"></div>
                </div>

            </div>
            <div id="form-textarea">
                <p>
                    <label class="required">{{ __('Details') }}<span>*</span></label>
                    <textarea id="question-details" aria-required="true" cols="58" rows="8" name="content">{{ $question->content }}</textarea>
                    @error('content')
                    <span class="error form-description">{{ $message }}</span>
                    @enderror
                </p>
            </div>
            <p class="form-submit">
                <input type="submit" id="publish-question" value="{{ __('Publish Your Question') }}" class="button color small submit">
            </p>
        </form>
    </div>
</div><!-- End page-content -->
</div>
@endsection
