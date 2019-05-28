@extends('layouts.app')
@section('breadcrumbs')
<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $post->title }}</h1>
            </div>
            <div class="col-md-12">
                <div class="crumbs">
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    <span class="crumbs-span">/</span>
                    <a href="{{ route('posts.index') }}">{{ __('Post') }}</a>
                    <span class="crumbs-span">/</span>
                    <span class="current">
                        {{ $post->title }}
                    </span>
                </div>
            </div>
        </div><!-- End row -->
    </section><!-- End container -->
</div><!-- End breadcrumbs -->
@endsection
@section('main')
<div class="col-md-9">
    <article class="post single-post clearfix">
        <div class="post-inner">
        <h2 class="post-title"><span class="post-type"><i class="icon-pencil"></i></span>{{ $post->title }}</h2>
            <div class="post-content">
                @markdown($post->content)
            </div><!-- End post-content -->
            <div class="post-meta">
                <span class="meta-author"><i class="icon-user"></i><a href="#">{{ $post->user->fullname }}</a></span>
                <span class="meta-date"><i class="icon-time"></i>{{ $post->created_at->diffForHumans() }}</span>
                <span class="meta-categories"><i class="icon-suitcase"></i><a href="#">{{ $post->category->name }}</a></span>
                <span class="meta-comment"><i class="icon-comments-alt"></i><a href="#">{{ $post->comments->count() }} {{ __('comments') }}</a></span>
            </div>
            <div class="clearfix"></div>
        </div><!-- End post-inner -->
    </article><!-- End article.post -->
    
    <div class="share-tags page-content">
        <div class="post-tags"><i class="icon-tags"></i>
            @foreach ($post->tags as $tag)
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
                    <a href="#" target="_blank">Facebook</a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="20" span_bg="#00baf0" span_hover="#666">
                                <i i_color="#FFF" class="social_icon-twitter"></i>
                            </span>
                        </span>
                    </a>
                    <a target="_blank" href="#">Twitter</a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="20" span_bg="#ca2c24" span_hover="#666">
                                <i i_color="#FFF" class="social_icon-gplus"></i>
                            </span>
                        </span>
                    </a>
                    <a href="#" target="_blank">Google plus</a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="20" span_bg="#e64281" span_hover="#666">
                                <i i_color="#FFF" class="social_icon-dribbble"></i>
                            </span>
                        </span>
                    </a>
                    <a href="#" target="_blank">Dribbble</a>
                </li>
                <li>
                    <a target="_blank" href="#">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="20" span_bg="#c7151a" span_hover="#666">
                                <i i_color="#FFF" class="icon-pinterest"></i>
                            </span>
                        </span>
                    </a>
                    <a href="#" target="_blank">Pinterest</a>
                </li>
            </ul>
            <span class="share-inside-f-arrow"></span>
            <span class="share-inside-l-arrow"></span>
        </div><!-- End share-inside-warp -->
        <div class="share-inside"><i class="icon-share-alt"></i>Share</div>

        @can('update', $post)
            &nbsp; &nbsp;<a href="{{ route('posts.edit', ['post' => $post->id]) }}"><i class="fa fa-edit"></i> {{ __('Edit') }}</a>&nbsp; &nbsp;
        @endcan
        @can('delete', $post)
            <a href="#" id="post_id"><i class="fa fa-times"></i> {{ __('delete') }}</a>
            <form id="delete-form" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                <input type="hidden" name="_method" value="delete">
                {{ csrf_field() }}
            </form>
        @endcan

        <div class="clearfix"></div>
    </div><!-- End share-tags -->
</div>
@endsection
@section('sidebar')
<aside class="col-md-3 sidebar">
    @include('layouts.statistic')
    <div class="widget widget_stats">
        <h3 class="widget_title">{{ __('About author') }}</h3>
        <div class="ul_list ul_list-icon-ok">
            <ul>
                <li>
                    <div class="author-img">
                        <a href="{{ route('users.show', ['user' => $post->user->id]) }}"><img src="{{ asset(config('asset.avatar_path') . $post->user->avatar) }}" alt="{{ $post->user->fullname }}"></a>
                    </div>
                    <h6><a href="{{ route('users.show', ['user' => $post->user->id]) }}">{{ $post->user->fullname }}</a></h6>
                </li>
                <li><i class="icon-question-sign"></i>{{ __('Questions') }} ( <span>{{ $post->user->questions->count() }}</span> )</li>
                <li><i class="icon-comment"></i>{{ __('Answers') }} ( <span>{{ $post->user->answers->count() }}</span> )</li>
                <li><i class="icon-btc"></i>{{ __('Points') }} ( <span>{{ $post->user->point }}</span> )</li>
            </ul>
        </div>
    </div>
    <div class="widget">
        <h3 class="widget_title">{{ __('Authors Post') }}</h3>
        <ul class="related-posts">
            @foreach ($post->user->posts as $post)
                <li class="related-item">
                    <h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
                    <div class="clear"></div>
                    <span>{{ $post->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
@endsection
