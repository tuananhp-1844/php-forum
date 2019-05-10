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
                    <a href="#">{{ __('Forget') }}</a>
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
            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
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
                <a href="#"><img width="60" height="60" src="{{ asset(Auth::user()->avatar) }}" alt="{{ Auth::user()->fullname }}"></a>
                </div>
                <h6><a href="#">{{ Auth::user()->fullname }}</a></h6>
            </li>
        <li><i class="icon-question-sign"></i>{{ __('Questions') }} ( <span>{{ Auth::user()->questions->count() }}</span> )</li>
        <li><i class="icon-comment"></i>{{ __('Answers') }} ( <span>{{ Auth::user()->answers->count() }}</span> )</li>
        <li><i class="icon-btc"></i>{{ __('Points') }} ( <span>{{ Auth::user()->point }}</span> )</li>
        </ul>
    </div>
</div>
@endif
