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
        <a class="question-report" href="#">{{ __('Report') }}</a>
        @if ($question->is_poll)
            <div class="question-type-main"><i class="icon-signal"></i>{{ __('Poll') }}</div>
        @else
            <div class="question-type-main"><i class="icon-question-sign"></i>{{ __('Question') }}</div>
        @endif
        <div class="question-inner">
            <div class="clearfix"></div>
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
            <a href="#">{{ __('wordpress') }}</a>, <a href="#">{{ __('question') }}</a>, <a href="#">{{ __('developer') }}</a>
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
            <a href="#" original-title="{{ $question->user->fullname }}" class="tooltip-n"><img alt="" src=""></a>
        </div>
        <div class="author-bio">
            <h4>{{ __('About the Author') }}</h4>
            {{ __('Lorem') }}
        </div>
    </div><!-- End about-author -->

    <div id="commentlist" class="page-content">
        <div class="boxedtitle page-title">
            <h2>{{ __('Answers') }} ( <span class="color">{{ $question->answers->count() }}</span> )</h2>
        </div>
        <ol class="commentlist clearfix">
            <li class="comment">
                <div class="comment-body comment-body-answered clearfix">
                    <div class="avatar"><img alt="" src=""></div>
                    <div class="comment-text">
                        <div class="author clearfix">
                            <div class="comment-author"><a href="#">{{ __('admin') }}</a></div>
                            <div class="comment-vote">
                                <ul class="question-vote">
                                    <li><a href="#" class="question-vote-up" title="Like"></a></li>
                                    <li><a href="#" class="question-vote-down" title="Dislike"></a></li>
                                </ul>
                            </div>
                            <span class="question-vote-result">+1</span>
                            <div class="comment-meta">
                                <div class="date"><i class="icon-time"></i>{{ __('January 15 , 2014 at 10:00 pm') }}</div>
                            </div>
                            <a class="comment-reply" href="#"><i class="icon-reply"></i>{{ __('Reply') }}</a>
                        </div>
                        <div class="text">
                            <p>{{ __('Lorem') }}</p>
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
                    <textarea id="comment" name="comment" aria-required="true" cols="58" rows="8"></textarea>
                </p>
            </div>
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" value="Post your answer" class="button small color">
            </p>
        </form>
    </div>

    <div class="post-next-prev clearfix">
        <p class="prev-post">
            <a href="#"><i class="icon-double-angle-left"></i>&nbsp;{{ __('Prev question') }}</a>
        </p>
        <p class="next-post">
            <a href="#">{{ __('Next question') }}&nbsp;<i class="icon-double-angle-right"></i></a>
        </p>
    </div><!-- End post-next-prev -->
</div><!-- End main -->
@endsection

@section('sidebar')
<aside class="col-md-3 sidebar">

        <div class="widget widget_login">
            <h3 class="widget_title">{{ __('Login') }}</h3>
            <div class="form-style form-style-2">
                <form>
                    <div class="form-inputs clearfix">
                        <p class="login-text">
                            <input type="text" value="Username" onfocus="if (this.value == 'Username') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Username'; }">
                            <i class="icon-user"></i>
                        </p>
                        <p class="login-password">
                            <input type="password" value="Password" onfocus="if (this.value == 'Password') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Password'; }">
                            <i class="icon-lock"></i>
                            <a href="#">{{ __('Forget') }}</a>
                        </p>
                    </div>
                    <p class="form-submit login-submit">
                        <input type="submit" value="Log in" class="button color small login-submit submit">
                    </p>
                    <div class="rememberme">
                        <label><input type="checkbox" checked="checked">{{ __('Remember Me') }}</label>
                    </div>
                </form>
                <ul class="login-links login-links-r">
                    <li><a href="#">{{ __('Register') }}</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    
        <div class="widget widget_stats">
            <h3 class="widget_title">{{ __('Stats') }}</h3>
            <div class="ul_list ul_list-icon-ok">
                <ul>
                    <li><i class="icon-question-sign"></i>{{ __('Questions') }} ( <span>20</span> )</li>
                    <li><i class="icon-comment"></i>{{ __('Answers') }} ( <span>50</span> )</li>
                </ul>
            </div>
        </div>
    
        <div class="widget widget_highest_points">
            <h3 class="widget_title">{{ __('Highest points') }}</h3>
            <ul>
                <li>
                    <div class="author-img">
                    <a href="#"><img width="60" height="60" src="{{ asset(config('asset.logo')) }}" alt=""></a>
                    </div>
                    <h6><a href="#">{{ __('admin') }}</a></h6>
                    <span class="comment">12 {{ __('Points') }}</span>
                </li>
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
    
    </aside>
<!-- End sidebar
@endsection
