@extends('layouts.generic')

@section('page_title', __(''))
@section('share_url', route('home'))
@section('share_title', getSetting('site.name') . ' - ' . getSetting('site.slogan'))
@section('share_description', getSetting('site.description'))
@section('share_type', 'article')
@section('share_img', GenericHelper::getOGMetaImage())
@section('styles')
    {!!
        Minify::stylesheet([
            '/css/marketplace.css'
         ])->withFullUrl()
    !!}
    <style type="text/css">
        .accordion-button { padding: 10px !important; }
    </style>
@stop

@section('content')
    <div class="container pt-4">
        <div class="page-content-wrapper pb-5">
          <div class="px-2 px-md-4">
            <div class="row" style="margin: 15px;">
                @include('marketplace.partials.location_filter', ['countries' => $countries])
                    <div class="col-12 col-md-8 offset-md-2">
                        <div class="page-header mt-2 mb-5 text-center">
                          <h1 class=" text-bold"></h1>

                        </div>

                    </div>
                </div>
              </div>
        </div>
    </div>
@stop
