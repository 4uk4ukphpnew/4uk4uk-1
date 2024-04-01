@extends('layouts.no-nav')
@section('page_title', __('Register'))

@if(getSetting('security.recaptcha_enabled') && !Auth::check())
    @section('meta')
        {!! NoCaptcha::renderJs() !!}
    @stop
@endif

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-12">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-xl-6 mx-auto">
                                <a href="{{action('HomeController@index')}}">
                                    <img class="brand-logo pb-4" src="{{asset( (Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? getSetting('site.dark_logo') : getSetting('site.light_logo')) : (Cookie::get('app_theme') == 'dark' ? getSetting('site.dark_logo') : getSetting('site.light_logo'))) )}}">
                                </a>
                                @include('auth.register-form')
                                @include('auth.social-login-box')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
