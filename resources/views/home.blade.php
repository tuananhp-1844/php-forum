@extends('layouts.app')

@section('ask-me')
<div class="section-warp ask-me">
    <div class="container clearfix">
        <div class="box_icon box_warp box_no_border box_no_background" box_border="transparent"
            box_background="transparent" box_color="#FFF">
            <div class="row">
                <div class="col-md-3">
                    <h2>{{ __('Welcome to Ask me') }}</h2>
                    <p>{{ __('Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque.') }}</p>
                    <div class="clearfix"></div>
                    <a class="color button dark_button medium" href="#">{{ __('About Us') }}</a>
                    <a class="color button dark_button medium" href="#">{{ __('Join Now') }}</a>
                </div>
                <div class="col-md-9">
                    <form class="form-style form-style-2" method="GET" action="{{ route('questions.create') }}">
                        <p>
                            <textarea rows="4" id="question_title" readonly onfocus = "if(this.value == {{ __('Ask any question and you be sure find your answer ?') }}) this.value = '';" onblur = "if(this.value == '') this.value = {{ __('Ask any question and you be sure find your answer ?') }};">{{ __('Ask any question and you be sure find your answer ?') }}</textarea>
                            <i class="icon-pencil"></i>
                            <button class="color button small publish-question">{{ __('Ask Now') }}</button>
                        </p>
                    </form>
                </div>
            </div><!-- End row -->
        </div><!-- End box_icon -->
    </div><!-- End container -->
</div><!-- End section-warp -->
@endsection

@section('main')
<div class="col-md-9">
    <div class="tabs-warp question-tab">
        <ul class="tabs">
            <li class="tab"><a href="{{ route('questions.index') }}">{{ __('Recent Questions') }}</a></li>
            <li class="tab"><a href="{{ route('questions.index', ['tag' => 'unresolve']) }}">{{ __('Unsolved') }}</a></li>
            <li class="tab"><a href="{{ route('questions.index', ['tag' => 'no-answer']) }}">{{ __('No answers') }}</a></li>
            <li class="tab"><a href="{{ route('questions.index', ['tag' => 'poll']) }}">{{ __('Poll') }}</a></li>
        </ul>
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
@section('sidebar')
<aside class="col-md-3 sidebar">

    @include('layouts.statistic')

    <div class="widget widget_highest_points">
        <h3 class="widget_title">{{ __('Highest points') }}</h3>
        <ul>
            @foreach ($userHightPoint as $user)
            <li>
                <div class="author-img">
                <a href="#"><img width="60" height="60" src="{{ asset($user->avatar) }}" alt="{{ $user->fullname }}"></a>
                </div>
                <h6><a href="#">{{ $user->fullname }}</a></h6>
                <span class="comment">{{ $user->point }} {{ __('Points') }}</span>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="widget widget_tag_cloud">
        <h3 class="widget_title">{{ __('Tags') }}</h3>
        <a href="#">{{ __('projects') }}</a>
        <a href="#">{{ __('Portfolio') }}</a>
        <a href="#">{{ __('Wordpress') }}</a>
        <a href="#">{{ __('Html') }}</a>
        <a href="#">{{ __('Css') }}</a>
        <a href="#">{{ __('jQuery') }}</a>
        <a href="#">{{ __('2code') }}</a>
        <a href="#">{{ __('vbegy') }}</a>
    </div>

    <div class="widget">
        <h3 class="widget_title">{{ __('Recent Questions') }}</h3>
        <ul class="related-posts">
            <li class="related-item">
                <h3><a href="#">{{ __('This is my first Question') }}</a></h3>
                <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                <div class="clear"></div>
                <span>{{ __('Feb 22, 2014') }}</span>
            </li>
            <li class="related-item">
                <h3><a href="#">{{ __('This Is My Second Poll Question') }}</a></h3>
                <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                <div class="clear"></div>
                <span>{{ __('Feb 22, 2014') }}</span>
            </li>
        </ul>
    </div>

</aside><!-- End sidebar -->
@endsection
