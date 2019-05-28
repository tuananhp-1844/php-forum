@extends('layouts.app')
@section('ask-me')
<div class="section-warp ask-me">
    <div class="container clearfix">
        <div class="box_icon box_warp box_no_border box_no_background" box_border="transparent" box_background="transparent" box_color="#FFF">
            <div class="row">
                <div class="col-md-3">
                    <h2>{{ __('Welcome to Ask me') }}</h2>
                    <p>{{ __('Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque.') }}
                    </p>
                    <div class="clearfix"></div>
                    <a class="color button dark_button medium" href="{{ route('questions.create') }}">{{ __('About Us') }}</a>
                    <a class="color button dark_button medium" href="{{ route('questions.create') }}">{{ __('Join Now') }}</a>
                </div>
                <div class="col-md-9">
                    <form class="form-style form-style-2" method="GET" action="{{ route('posts.create') }}">
                        <p>
                            <textarea rows="4" id="question_title" readonly onfocus="if(this.value == {{ __('Create your post !') }}) this.value = '';" onblur="if(this.value == '') this.value = {{ __('Create your post !') }};">{{ __('Create your post !') }}</textarea>
                            <i class="icon-pencil"></i>
                            <button class="color button small publish-question">{{ __('New post') }}</button>
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
            <li class="tab"><a href="{{ route('posts.index', ['tag' => 'recent-question']) }}" data-tag="recent-question" id="recent-question">{{ __('Newest') }}</a></li>
            <li class="tab"><a href="{{ route('posts.index', ['tag' => 'editors-choice']) }}" data-tag="editors-choice">{{ __('Editors-choice') }}</a></li>
            <li class="tab"><a href="{{ route('posts.index', ['tag' => 'trending']) }}" data-tag="trending">{{ __('Trending') }}</a></li>
            @if (Auth::check())
            <li class="tab"><a href="{{ route('posts.index', ['tag' => 'my-clips']) }}" data-tag="my-clips">{{ __('My clips') }}</a></li>
            @endif
        </ul>
        <div class="tab-inner-warp">
            <div class="tab-inner">
                @foreach ($posts as $post)
                <article class="post clearfix">
                    <div class="post-inner">
                        <h2 class="post-title"><span class="post-type"><i class="icon-pencil"></i></span><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
                        <div class="post-meta">
                            <span class="meta-author"><i class="icon-user"></i><a href="#">{{ $post->user->fullname }}</a></span>
                            <span class="meta-date"><i class="icon-time"></i>{{ $post->created_at->diffForHumans() }}</span>
                            <span class="meta-categories"><i class="icon-suitcase"></i><a href="#">{{ $post->category->name }}</a></span>
                            <span class="meta-comment"><i class="icon-comments-alt"></i><a href="#">{{ $post->comments->count() }} {{ __('comments') }}</a></span>
                        </div>
                        <div class="post-content">
                            <p>@markdown($post->content)</p>
                        </div><!-- End post-content -->
                        <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="post-read-more button color small">{{ __('Continue reading') }}</a>
                    </div><!-- End post-inner -->
                </article><!-- End article.post -->
                @endforeach
            </div>
        </div>
        {{ $posts->render('paginations.paginate') }}
    </div>
</div>
@endsection
@section('sidebar')
<aside class="col-md-3 sidebar">
    @include('layouts.statistic')
    <div class="widget">
        <h3 class="widget_title">{{ __('New Questions') }}</h3>
        <ul class="related-posts">
            @foreach ($questions as $question)
                <li class="related-item">
                    <h3><a href="{{ route('questions.show', ['id' => $question->id]) }}">{{ $question->title }}</a></h3>
                    <div class="clear"></div>
                    <span>{{ $question->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget widget_tag_cloud">
        <h3 class="widget_title">{{ __('Hot Tags') }}</h3>
        @foreach ($hotTag as $tag)
            <a href="{{ route('tags.questions.index', ['id' => $tag->id]) }}">{{ $tag->name }} ({{ $tag->questions->count() }})</a>
        @endforeach
    </div>
</aside>
@endsection
@push('scripts')
<script src="{{ mix('js/post.js') }}"></script>
@endpush
