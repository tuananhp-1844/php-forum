@extends('layouts.app')

@section('breadcrumbs')
<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $question->title }}</h1>
            </div>
            <div class="col-md-12">
                <div class="crumbs">
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    <span class="crumbs-span">/</span>
                    <span class="current">{{ $question->title }}</span>
                </div>
            </div>
        </div><!-- End row -->
    </section><!-- End container -->
</div><!-- End breadcrumbs -->
@endsection

@section('main')

<div class="col-md-9">
    <article class="question single-question question-type-normal">
        <h2>
            <a href="single_question.html">{{ $question->title }}</a>
        </h2>
        @if (Auth::check())
        <a class="question-report" id = "report" data-question="{{ $question->id }}">{{ __('Report') }}</a>
        @else
        <a class="question-report" href="{{ route('login') }}">{{ __('Report') }}</a>
        @endif
        @if ($question->is_poll)
        <div class="question-type-main"><i class="icon-signal"></i>{{ __('Poll') }}</div>
        @else
        <div class="question-type-main"><i class="icon-question-sign"></i>{{ __('Question') }}</div>
        @endif
        <div class="question-inner">
            <div class="poll_2">
                @if ($question->is_poll)
                <form class="form-style form-style-3">
                    <div class="form-inputs clearfix">
                        @foreach ($question->polls as $item)
                            <p>
                                <input id="poll-{{ $item->id }}" name="poll-radio" type="radio">
                                <label for="poll-{{ $item->id }}">{{ $item->title }}  ({{ __('3 lượt chọn') }})</label>
                            </p>
                        @endforeach
                    </div>
                </form>
                @endif
            </div>
            <div class="clearfix height_10"></div>
            <div class="question-desc">
                {{ $question->content }}
            </div>
            <div class="question-details">
                @if ($question->is_resolve == 0)
                    <span class="question-answered"><i class="icon-ok"></i>{{ __('in progress') }}</span>
                @else
                    <span class="question-answered question-answered-done"><i class="icon-ok"></i>{{ __('solved') }}</span>
                @endif
                {{-- <span class="question-favorite"><i class="icon-star"></i>{{ $question->votes->count() }}</span> --}}
            </div>
            <span class="question-category"><a href="#"><i class="icon-folder-close"></i>{{ $question->category->name }}</a></span>
            <span class="question-date"><i class="icon-time"></i>{{ $question->created_at->diffForHumans() }}</span>
            <span class="question-comment"><a href="#"><i class="icon-comment"></i>{{ $question->answers->count() }} {{ __('Answer') }}</a></span>
            <span class="question-view"><i class="icon-user"></i>{{ $question->view }} {{ __('Views') }}</span>
            <span class="single-question-vote-result">+ {{ $question->votes->count() }}</span>
            <ul class="single-question-vote">
                <li><a href="#" class="single-question-vote-down" title="Dislike"><i class="icon-thumbs-down"></i></a>
                </li>
                <li><a href="#" class="single-question-vote-up" title="Like"><i class="icon-thumbs-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </article>

    <div class="share-tags page-content">
        <div class="question-tags"><i class="icon-tags"></i>
            @foreach ($question->tags as $tag)
                <a href="#">{{ $tag->name }}</a>
                @if (!$loop->last), 
                @endif
            @endforeach
        </div>
        <div class="share-inside-warp">
            <ul>
                <li>
                    <a href="#" original-title="Facebook">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="20" span_bg="#3b5997" span_hover="#666">
                                <i i_color="#FFF" class="social_icon-facebook"></i>
                            </span>
                        </span>
                    </a>
                    <a href="#" target="_blank">{{ __('Facebook') }}</a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="20" span_bg="#00baf0" span_hover="#666">
                                <i i_color="#FFF" class="social_icon-twitter"></i>
                            </span>
                        </span>
                    </a>
                    <a target="_blank" href="#">{{ __('Twitter') }}</a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="20" span_bg="#ca2c24" span_hover="#666">
                                <i i_color="#FFF" class="social_icon-gplus"></i>
                            </span>
                        </span>
                    </a>
                    <a href="#" target="_blank">{{ __('Google plus') }}</a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="20" span_bg="#e64281" span_hover="#666">
                                <i i_color="#FFF" class="social_icon-dribbble"></i>
                            </span>
                        </span>
                    </a>
                    <a href="#" target="_blank">{{ __('Dribbble') }}</a>
                </li>
                <li>
                    <a target="_blank" href="#">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="20" span_bg="#c7151a" span_hover="#666">
                                <i i_color="#FFF" class="icon-pinterest"></i>
                            </span>
                        </span>
                    </a>
                    <a href="#" target="_blank">{{ __('Pinterest') }}</a>
                </li>
            </ul>
            <span class="share-inside-f-arrow"></span>
            <span class="share-inside-l-arrow"></span>
        </div><!-- End share-inside-warp -->
        <div class="share-inside"><i class="icon-share-alt"></i>{{ __('Share') }}</div>
        <div class="clearfix"></div>
    </div><!-- End share-tags -->

    <div class="about-author clearfix">
        <div class="author-image">
            <a href="#" original-title="{{ $question->user->fullname }}" class="tooltip-n">
                <img alt="" src="{{ asset($question->user->avatar) }}">
            </a>
        </div>
        <div class="author-bio">
            <h4>{{ $question->user->fullname }}</h4>
            <a href="">{{ $question->user->point }} {{ __('Points') }}</a> <br/>
        </div>
    </div><!-- End about-author -->

    <div id="commentlist" class="page-content">
        <div class="boxedtitle page-title">
            <h2>{{ __('Answers') }} ( <span class="color">{{ $question->answers->count() }}</span> )</h2>
        </div>
        <ol class="commentlist clearfix">
            @foreach ($question->answers as $comment)
            <li class="comment">
                <div class="comment-body comment-body-answered clearfix">
                    <div class="avatar"><img alt="" src="{{ asset($comment->user->avatar) }}"></div>
                    <div class="comment-text">
                        <div class="author clearfix">
                            <div class="comment-author"><a href="#">{{ $comment->user->fullname }}</a></div>
                            <div class="comment-vote">
                                <ul class="question-vote">
                                    <li><a href="#" class="question-vote-up" title="Like"></a></li>
                                    <li><a href="#" class="question-vote-down" title="Dislike"></a></li>
                                </ul>
                            </div>
                            <span class="question-vote-result">+1</span>
                            <div class="comment-meta">
                                <div class="date"><i class="icon-time"></i>{{ $comment->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <a class="comment-reply" href="#"><i class="icon-reply"></i>{{ __('Reply') }}</a>
                        </div>
                        <div class="text">
                            <p>{{ $comment->content }}</p>
                        </div>
                        <div class="question-answered question-answered-done"><i class="icon-ok"></i>{{ __('Best Answer') }}
                        </div>
                    </div>
                </div>
                <ul class="children">
                    <li class="comment">
                        <div class="comment-body clearfix">
                            <div class="avatar"><img alt="" src=""></div>
                            <div class="comment-text">
                                <div class="author clearfix">
                                    <div class="comment-author"><a href="#">{{ __('vbegy') }}</a></div>
                                    <div class="comment-vote">
                                        <ul class="question-vote">
                                            <li><a href="#" class="question-vote-up" title="Like"></a></li>
                                            <li><a href="#" class="question-vote-down" title="Dislike"></a></li>
                                        </ul>
                                    </div>
                                    <span class="question-vote-result">+1</span>
                                    <div class="comment-meta">
                                        <div class="date"><i class="icon-time"></i>{{ __('January 15 , 2014 at 10:00 pm') }}
                                        </div>
                                    </div>
                                    <a class="comment-reply" href="#"><i class="icon-reply"></i>{{ __('Reply') }}</a>
                                </div>
                                <div class="text">
                                    <p>{{ __('Lorem') }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul><!-- End children -->
            </li>
            @endforeach
        </ol><!-- End commentlist -->
    </div><!-- End page-content -->

    <div id="respond" class="comment-respond page-content clearfix">
        <div class="boxedtitle page-title">
            <h2>{{ __('Leave a reply') }}</h2>
        </div>
        <form action="#" method="post" id="commentform" class="comment-form">
            <div id="respond-textarea">
                <p>
                    <label class="required" for="comment">{{ __('Comment') }}<span>*</span></label>
                    <textarea id="question-details" name="comment" aria-required="true" cols="58" rows="8" id = ""></textarea>
                </p>
            </div>
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" value="Post your answer" class="button small color">
            </p>
        </form>
    </div>
</div><!-- End main -->
@endsection

@section('sidebar')
<aside class="col-md-3 sidebar">
    @include('layouts.statistic')

    <div class="widget">
        <h3 class="widget_title">{{ __('Relate Questions') }}</h3>
        <ul class="related-posts">
            @foreach ($relate as $question)
                <li class="related-item">
                    <h3><a href="#">{{ $question->title }}</a></h3>
                    <div class="clear"></div>
                    <span>{{ $question->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
<!-- End sidebar
@endsection
