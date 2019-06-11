@extends('layouts.app')
@section('main')
<div class="height_20"></div>
<div class="col-md-3">
    @include('profile.sidebar')
</div>
<div class="col-md-9">
        <div class="page-content">
        <div class="boxedtitle page-title"><h2>{{ __('Notification') }}</h2></div>
        <div class="page-content page-content-user">
            <div class="user-questions">
                @if (!$notifications->count())
                <div class="height_20"></div>
                {{ __('No Notification') }}
                @endif
                @foreach ($notifications as $notify)
                <article class="question user-question">
                    <h3>
                        <a href="{{ $notify->data['link'] }}">
                            <i class="{{ $notify->data['icon'] }}"></i>
                            {{ $notify->data['full_name'] }} <span class="notifi_massage">{{ $notify->data['message'] }}</span>
                            {{ $notify->data['title'] }}
                        </a>
                    </h3>
                </article>
                @endforeach
                {{ $notifications->render('paginations.paginate') }}
            </div>
        </div>
    </div>
</div>
@endsection
