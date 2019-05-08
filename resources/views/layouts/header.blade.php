	
	<div class="panel-pop" id="signup">
		<form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
		{{-- <h2>Register Now<i class="icon-remove"></i></h2>
		<div class="form-style form-style-3">
			<form>
				<div class="form-inputs clearfix">
					<p>
						<label class="required">Username<span>*</span></label>
						<input type="text">
					</p>
					<p>
						<label class="required">E-Mail<span>*</span></label>
						<input type="email">
					</p>
					<p>
						<label class="required">Password<span>*</span></label>
						<input type="password" value="">
					</p>
					<p>
						<label class="required">Confirm Password<span>*</span></label>
						<input type="password" value="">
					</p>
				</div>
				<p class="form-submit">
					<input type="submit" value="Signup" class="button color small submit">
				</p>
			</form>
		</div> --}}
	</div><!-- End signup -->
	
	<div class="panel-pop" id="lost-password">
		<h2>Lost Password<i class="icon-remove"></i></h2>
		<div class="form-style form-style-3">
			<p>Lost your password? Please enter your username and email address. You will receive a link to create a new password via email.</p>
			<form>
				<div class="form-inputs clearfix">
					<p>
						<label class="required">Username<span>*</span></label>
						<input type="text">
					</p>
					<p>
						<label class="required">E-Mail<span>*</span></label>
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
	
	<div id="header-top">
		<section class="container clearfix">
			<nav class="header-top-nav">
				<ul>
					<li><a href="contact_us.html"><i class="icon-envelope"></i>{{__('contact')}}</a></li>
					<li><a href="#"><i class="icon-headphones"></i>{{__('support')}}</a></li>
					@if (Auth::check())
						<li>
							<a href="#"><i class="icon-user"></i> Wellcome: {{Auth::user()->full_name}}</a>
						</li>
						<li>
							<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-sign-out"></i>{{__('Logout')}}</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
						</li>
					@else
						<li><a href="{{ route('login') }}"><i class="icon-user"></i>{{__('login')}}</a></li>
					@endif
				</ul>
			</nav>
			<div class="header-search">
				<form>
				    <input type="text" value="{{__('search here')}}" onfocus="this.value=''" onblur="if(this.value=='')this.value='{{__('search here')}}';">
				    <button type="submit" class="search-submit"></button>
				</form>
			</div>
		</section><!-- End container -->
	</div><!-- End header-top -->
	<header id="header">
		<section class="container clearfix">
			<div class="logo"><a href="/"><img alt="" src="{{ asset('bower_components/asset-project1-sun/images/logo.png') }}"></a></div>
			<nav class="navigation">
				<ul>
                <li><a href="{{ route('home')}}">{{__('home')}}</a></li>
                <li class="ask_question"><a href="{{ route('questions.create')}}">{{__('Ask Question')}}</a></li>
					<li><a href="cat_question.html">{{__('Questions')}}</a>
						<ul>
							<li><a href="cat_question.html">Questions Category</a></li>
							<li><a href="single_question.html">Question Single</a></li>
							<li><a href="single_question_poll.html">Poll Question Single</a></li>
						</ul>
					</li>
                @if (Auth::check())
					<li>
						<a href="user_profile.html">{{__('Profile')}}</a>
						<ul>
							<li><a href="user_profile.html">User Profile</a></li>
							<li><a href="user_questions.html">User Questions</a></li>
							<li><a href="user_answers.html">User Answers</a></li>
							<li><a href="user_favorite_questions.html">User Favorite Questions</a></li>
							<li><a href="user_points.html">User Points</a></li>
							<li><a href="edit_profile.html">Edit Profile</a></li>
						</ul>
					</li>	
				@endif
				
				<li><a>{{session('website_language', config('app.locale'))}}</a>
						<ul>
							<li><a href="{{ route('change-language', ['lang' => 'vi']) }}">Việt Nam</a></li>
							<li><a href="{{ route('change-language', ['lang' => 'en']) }}">English</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</section><!-- End container -->
	</header><!-- End header -->