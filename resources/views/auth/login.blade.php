@extends('layouts.no-nav')
@section('page_title', __('Login'))

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-12">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                      <div class="row" style="margin-right: 100px;">
                      <div class="col-lg-7 col-xl-8 mx-auto">
                      <a href="{{action('HomeController@index')}}">
                          <img class="brand-logo pb-4" src="{{asset( (Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? getSetting('site.dark_logo') : getSetting('site.light_logo')) : (Cookie::get('app_theme') == 'dark' ? getSetting('site.dark_logo') : getSetting('site.light_logo'))) )}}">
                      </a>
                    </div>
                      </div>
                        <div class="row">

                            <div class="col-lg-7 col-xl-8 mx-auto">



                                @include('auth.login-form')
                                @include('auth.social-login-box')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<style type="text/css">
  .brand-logo { width: 450px !important; }
</style>
@endsection
