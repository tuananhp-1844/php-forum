@extends('layouts.app')
@section('breadcrumbs')
<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
            <h1><i class="fa fa-bell-o" aria-hidden="true"></i> {{ __('Notifications') }}</h1>
            </div>
        </div><!-- End row -->
    </section><!-- End container -->
</div><!-- End breadcrumbs -->
@endsection
@section('main')
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
                    {{ $notify->data['full_name'] }} <span class="notifi_massage">{{ $notify->data['message'] }}</span> {{ $notify->data['title'] }}
                </a>
            </h3>
        </article>
        @endforeach
        {{ $notifications->render('paginations.paginate') }}
    </div>
</div>
@endsection
