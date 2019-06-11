@extends('layouts.app')
@section('main')
<div class="height_20"></div>
<div class="col-md-3">
    @include('profile.sidebar')
</div>
<div class="col-md-9">
    <div class="row">
        <div class="user-profile">
            <div class="col-md-12">
                <div class="page-content">
                    <h2>
                        {{ Auth::user()->fullname }}
                        <span class="edit">
                            <a href="{{ route('profile.edit') }}"><i class="icon-edit"></i> {{ __('Edit') }}</a>
                        </span>
                    </h2>
                    <div class="user-profile-img">
                        <img id="avatar_preview" src="{{ asset(config('asset.avatar_path') . Auth::user()->avatar) }}"
                            alt="{{ Auth::user()->fullname }}">
                    </div>
                    <div class="ul_list ul_list-icon-ok about-user">
                        <ul>
                            <li><i class="icon-plus"></i>{{ __('Registerd') }} : <span>{{ Auth::user()->created_at->diffForHumans() }}</span></li>
                            <li><i class="icon-map-marker"></i>{{ __('Country') }} : <span>{{ __('Việt Nam') }}</span>
                            </li>
                            <li><i class="icon-globe"></i>{{ __('Website') }} : <a target="_blank" href="{{ Auth::user()->website }}">{{ __('view') }}</a></li>
                        </ul>
                    </div>
                    <p>
                        {{ Auth::user()->info }}
                    </p>
                    <div class="clearfix"></div>
                    <span class="user-follow-me">{{ __('Follow Me') }}</span>
                    <a target="_blank" href="{{ Auth::user()->facebook }}" original-title="Facebook" class="tooltip-n">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="30" span_bg="#3b5997" span_hover="#2f3239">
                                <i class="social_icon-facebook"></i>
                            </span>
                        </span>
                    </a>
                    <a target="_blank" href="{{ Auth::user()->twitter }}" original-title="Twitter" class="tooltip-n">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="30" span_bg="#00baf0" span_hover="#2f3239">
                                <i class="social_icon-twitter"></i>
                            </span>
                        </span>
                    </a>
                    <a target="_blank" href="{{ Auth::user()->linker }}" original-title="Linkedin" class="tooltip-n">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="30" span_bg="#006599" span_hover="#2f3239">
                                <i class="social_icon-linkedin"></i>
                            </span>
                        </span>
                    </a>
                    <a target="_blank" href="{{ Auth::user()->google }}" original-title="Google plus" class="tooltip-n">
                        <span class="icon_i">
                            <span class="icon_square" icon_size="30" span_bg="#c43c2c" span_hover="#2f3239">
                                <i class="social_icon-gplus"></i>
                            </span>
                        </span>
                    </a>
                </div><!-- End page-content -->
            </div><!-- End col-md-12 -->
            <div class="col-md-12">
                <div class="page-content page-content-user-profile">
                    <div class="user-profile-widget">
                        <h2>{{ __('User Stats') }}</h2>
                        <div class="ul_list ul_list-icon-ok">
                            <ul>
                                <li><i class="icon-question-sign"></i><a href="user_questions.html">{{ __('Questions') }}<span> (<span>{{ Auth::user()->questions->count() }}</span> ) </span></a></li>
                                <li><i class="icon-comment"></i><a href="user_answers.html">{{ __('Answers') }}<span> (<span>{{ Auth::user()->answers->count() }}</span> ) </span></a></li>
                                <li><i class="icon-heart"></i><a href="user_points.html">{{ __('Points') }}<span> (<span>{{ Auth::user()->point }}</span> ) </span></a></li>
                                <li><i class="icon-asterisk"></i>{{ __('Best Answers') }}<span> (<span>{{ Auth::user()->answers->where('is_best', '1')->count() }}</span> )</span></li>
                            </ul>
                        </div>
                    </div><!-- End user-profile-widget -->
                </div><!-- End page-content -->
            </div><!-- End col-md-12 -->
        </div><!-- End user-profile -->
    </div><!-- End row -->
    <div class="height_20"></div>

    {{ $questions->render('paginations.paginate') }}
    <!-- End pagination -->
    <!-- if no questions
        <p>No questions yet</p>
        -->
</div><!-- End main -->
@endsection
