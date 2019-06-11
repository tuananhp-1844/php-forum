@if (!Auth::check())
<div class="widget widget_login">
    <h3 class="widget_title">{{ __('Login') }}</h3>
    <div class="form-style form-style-2">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-inputs clearfix">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
                <p class="login-text">
                    <input type="text" required name="email" value="{{ old('email') }}" placeholder="Email">
                    <i class="icon-envelope"></i>
                </p>
               
                <p class="login-password">
                    <input type="password" required name="password" placeholder="Password">
                    <i class="icon-lock"></i>
                    <a href="{{ route('password.request') }}">{{ __('Forget') }}</a>
                </p>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <p class="form-submit login-submit">
                <input type="submit" value="{{ __('Log in') }}" class="button color small login-submit submit">
            </p>
            <div class="rememberme">
                <label><input type="checkbox" checked="checked">{{ __('Remember Me') }}</label>
            </div>
        </form>
        <ul class="login-links">
            <li><a href="{{ route('redirect-social', ['social' => 'facebook']) }}"><i class="icon-facebook"></i>{{ __('facebook') }}</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
@else
<div class="widget widget_stats">
    <h3 class="widget_title">{{ __('Profile') }}</h3>
    <div class="ul_list ul_list-icon-ok">
        <ul>
            <li>
                <div class="author-img">
                <a href="{{ route('profile.index') }}"><img src="{{ asset(config('asset.avatar_path') . Auth::user()->avatar) }}" alt="{{ Auth::user()->fullname }}"></a>
                </div>
                <h6><a href="{{ route('profile.index') }}">{{ Auth::user()->fullname }}</a></h6>
            </li>
        <li>
            <a href="{{ route('notifications.index') }}"><i class="icon-question-sign"></i>{{ __('Notification') }} ( <span>{{ Auth::user()->unreadNotifications->count() }}</span> )
                @if (Auth::user()->unreadNotifications->count())
                    <span class="notify">!</span>
                @endif
            </a>
        </li>
        <li><a href="{{ route('profile.question') }}"><i class="icon-question-sign"></i>{{ __('Questions') }} ( <span>{{ Auth::user()->questions->count() }}</span> )</a></li>
        <li><a href="{{ route('profile.post') }}"><i class="icon-comment"></i>{{ __('Posts') }} ( <span>{{ Auth::user()->posts->count() }}</span> )</a></li>
        <li><a href="{{ route('profile.index') }}"><i class="icon-btc"></i>{{ __('Points') }} ( <span>{{ Auth::user()->point }}</span> )</a></li>
        <li><a href="{{ route('profile.clip') }}"><i class="fa fa-paperclip"></i>{{ __('Clips') }} ( <span>{{ Auth::user()->clips->count() + Auth::user()->postClips->count() }}</span> )</a></li>
        </ul>
    </div>
</div>
@endif
