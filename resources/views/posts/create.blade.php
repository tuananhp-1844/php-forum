@extends('layouts.app')
@section('breadcrumbs')
<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ __('Create Post') }}</h1>
            </div>
            <div class="col-md-12">
                <div class="crumbs">
                    <a href="#">{{ __('Home') }}</a>
                    <span class="crumbs-span">/</span>
                    <a href="{{ route('posts.index') }}">{{ __('Post') }}</a>
                    <span class="crumbs-span">/</span>
                    <span class="current">{{ __('Create Post') }}</span>
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
        <h2>{{ __('Create Post') }}</h2>
    </div>
    <div class="form-style form-style-3" id="question-submit">
        <form method = "POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-inputs clearfix">
                <p>
                    <label class="required">{{ __('Post Title') }}<span>*</span></label>
                    <input type="text" id="question-title" name="title" value="{{ old('title') }}">
                    <span class="form-description">{{ __('Please choose an appropriate title for the post to answer it even easier .') }}</span>
                    @error('title')
                        <span class="error form-description">{{ $message }}</span>
                    @enderror
                </p>
                <p>
                    <label>{{ __('Tags') }}</label>
                    <input type="text" class="input" name="tags" id="question_tags" data-seperator=",">
                    <span class="form-description">{{ __('Please choose suitable Keywords Ex') }} : <span class="color">{{ __('question') }} ,{{ __('poll') }}</span> .</span>
                </p>
                <p>
                    <label class="required">{{ __('Category') }}<span>*</span></label>
                    <span class="styled-select">
                    <select name="category" value = "{{ old('category') }}">
                        <option value="">{{ __('Select a Category') }}</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                    </span>
                    <span class="form-description">{{ __('Please choose the appropriate section so easily search for your post .') }}</span>
                    @error('category')
                        <span class="error form-description">{{ $message }}</span>
                    @enderror
                </p>
            </div>
            <div id="form-textarea">
                <p>
                    <textarea id="question-details" aria-required="true" cols="58" rows="8" name="content">{{ old('content') }}</textarea>
                    @error('content')
                    <span class="error form-description">{{ $message }}</span>
                    @enderror
                </p>
            </div>
            <p class="form-submit">
                <input type="submit" id="publish-question" value="{{ __('Publish Your Post') }}" class="button color small submit">
            </p>
        </form>
    </div>
</div><!-- End page-content -->
</div>
@endsection
