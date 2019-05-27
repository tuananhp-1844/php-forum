<div class="panel-pop" id="lost-password">
    <h2>{{ __('Lost Password') }}<i class="icon-remove"></i></h2>
    <div class="form-style form-style-3">
        <p>{{ __('Lost your password? Please enter your username and email address. You will receive a link to create a new password via email.') }}
        </p>
        <form>
            <div class="form-inputs clearfix">
                <p>
                    <label class="required">{{ __('Username') }}<span>*</span></label>
                    <input type="text">
                </p>
                <p>
                    <label class="required">{{ __('E-Mail') }}<span>*</span></label>
                    <input type="email">
                </p>
            </div>
            <p class="form-submit">
                <input type="submit" value="Reset" class="button color small submit">
            </p>
        </form>
        <div class="clearfix"></div>
    </div>
</div><!-- End lost-password -->
<div class="panel-pop" id="report-modal">
    <h2>{{ __('Report') }}<i class="icon-remove"></i></h2>
    <div class="form-style form-style-3">
        <form id="form-report">
            <div class="form-inputs clearfix">
                <p>
                    <label class="required">{{ __('Reason for reporting this content') }} :<span>*</span> <span class="error form-description report-error"></span></label>
                </p>
                <div id="list-report">
                </div>
                <p>
                    <label>{{ __('Comment') }} :</label>
                    <textarea name="comment" id="" cols="30" rows="5" placeholder="{{ __('Comment') }}"></textarea>
                </p>
            </div>
            <p class="form-submit">
                <input type="button" value="{{ __('Report') }}" class="button color small submit" id="submit_report">
            </p>
        </form>
        <div class="clearfix"></div>
    </div>    
</div>
<div id="header-top">
    <section class="container clearfix">
        <nav class="header-top-nav">
            <ul>
                <li><a href="contact_us.html"><i class="icon-envelope"></i>{{ __('contact') }}</a></li>
                <li><a href="#"><i class="icon-headphones"></i>{{ __('support') }}</a></li>
                @if (Auth::check())
                <li>
                    <a href="{{ route('profile.index') }}"><i class="icon-user"></i> {{ __('Wellcome') }}: {{ Auth::user()->full_name }}</a>
                </li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="icon-sign-out"></i>{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}</form>
                </li>
                @else
                <li><a href="{{ route('login') }}"><i class="icon-signin"></i>{{ __('login') }}</a></li>
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @endif
            </ul>
        </nav>
        <div class="header-search">
            <form method="GET" action="{{ route('search') }}">
                <input name="search" type="text" value="{{ __('search here') }}" onfocus="this.value=''"
                    onblur="if(this.value=='')this.value='{{ __('search here') }}';">
                <button type="submit" class="search-submit"></button>
            </form>
        </div>
    </section><!-- End container -->
</div><!-- End header-top -->
<header id="header">
    <section class="container clearfix">
        <div class="logo">
            <a href="{{ route('home')}}">
            <img alt="" src="{{ asset(config('asset.logo')) }}">
            </a>
        </div>
        <nav class="navigation">
            <ul>
                <li><a href="{{ route('home')}}">{{ __('home') }}</a></li>
                <li class="ask_question"><a href="{{ route('posts.index')}}">{{ __('Post') }}</a></li>
                <li class="ask_question"><a href="{{ route('questions.index')}}">{{ __('Question') }}</a></li>
                <li>
                    <a>{{ __('Category & Tag') }}</a>
                    <ul>
                        <li><a href="{{ route('categories.index') }}">{{ __('Category') }}</a></li>
                        <li><a href="{{ route('tags.index') }}">{{ __('Tag') }}</a></li>
                    </ul>
                </li>
                @if (Auth::check())
                <li>
                    <a>{{ __('Profile') }}</a>
                    <ul>
                        <li><a href="{{ route('profile.index') }}">{{ __('User Profile') }}</a></li>
                        <li><a href="{{ route('profile.edit') }}">{{ __('Edit Profile') }}</a></li>
                        <li><a href="{{ route('profile.clip') }}">{{ __('Clip question') }}</a></li>
                        <li>
                            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </li>
                    </ul>
                </li>
                @endif

                <li>
                    <a>{{ session('website_language', config('app.locale')) }}</a>
                    <ul>
                        <li><a href="{{ route('change-language', ['lang' => 'vi']) }}">{{ __('Việt Nam') }}</a></li>
                        <li><a href="{{ route('change-language', ['lang' => 'en']) }}">{{ __('English') }}</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </section><!-- End container -->
</header><!-- End header -->

